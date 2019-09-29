<?php

namespace App\Http\Controllers;

use Auth;
use App\prices;
use App\XgBands;
use App\Antennas;
use App\CachedResult;
use App\DebuggerHelper;
use App\SettingWebLara;
use function Psy\debug;
use App\AntennasProvider;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\AntennasBandsProvider;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use function Opis\Closure\serialize;
use function Opis\Closure\unserialize;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\IsFalse;
use Illuminate\Pagination\LengthAwarePaginator;

class AnalyserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * The welcome page
     *
     * @return view - welcome -> /
     */
    public function index()
    {
        return view('welcome')
            ->with("bands", XgBands::getBands());
    }

    /**
     * Receive form information to analyse them and return result
     *
     * @param Request $request system_number
     *                         | antenna_per_sector
     *                         | antenna_preferred (may not exist) default is one
     *                         | max_height
     *                         | technology[] | port[] | band[] bandIds
     *                         special parameter to show tech info by default
     *
     * @return View The result view
     */
    public function showResult(Request $request)
    {
        // return $request->all();
        $load_more = $request->input("load");
        if (isset($load_more)) {
            // https://stackoverflow.com/questions/44494064/laravel-how-to-remove-url-query-params
            session(["load" => true]);
            return redirect()->to(
                url()->current() . '?' . http_build_query(
                    $request->except("load")
                )
            );
        }
        DebuggerHelper::startRecording("result");
        $technology = $request->input("technology");
        $port = $request->input("port");
        $band = $request->input("band");
        $bandInfo = XgBands::getFullInfoFromIds($band);
        $antenna_per_sector = $request->input("antenna_per_sector");
        $max_height = $request->input("max_height");
        $antenna_preferred = $request->input("antenna_preferred");
        // only check later by isset
        if ($request->hasSession()) {
            $load_more = $request->session()->get("load");
            $request->session()->forget("load");
        } else {
            $load_more = false;
        }
        if (!isset($max_height)) {
            $max_height = PHP_INT_MAX;
        }
        if (!isset($antenna_preferred)) {
            $antenna_preferred = 1;
        }

        $doGenerateLink = $request->input("generateLinkOnly");
        if (isset($doGenerateLink)) {
            if ($max_height == PHP_INT_MAX) {
                $max_height = "";
            }
            $success = "Link generated";
            $agent = new Agent();
            if (!$agent->isMobile()) {
                $success .= " and copied to clipboard. Use <b>CTRL + V</b> <br>
                &nbsp &nbsp to share it anywhere you like.";
            } else {
                $success .= " successfully.";
            }
            $success .= "<br> <a href = "
                . url()->full() . "><span class='fas fa-link'></span> Test Link</a>";
            // This return view with predefined column and stuff
            return view('welcome')
                ->with("bands", XgBands::getBands())
                ->with("antenna_per_sector", $antenna_per_sector)
                ->with("antenna_preferred", $antenna_preferred)
                ->with("max_height", $max_height)
                ->with("technology", $technology)
                ->with("band", $band)
                ->with("port", $port)
                ->with("copyLinkToClip", true)
                ->with("success", $success);
        }

        // $request->session()->forget("load");
        // return var_dump($request->session()->get("load"));
        if (!isset($load_more)) {
            $load_more = false;
        }
        // DB::connection('mysql2')->table('Antennas')->
        $allAntennasBandsMap = Antennas::where(
            [
                ['total_nb_ports', "<=", array_sum($port) + 2],
                ['height_mm', "<=",  $max_height]
            ]
        )
            ->select(
                "id",
                "total_nb_ports",
                "ports_lt_1GH",
                "ports_btw_1_3GH",
                "ports_bt_3GH",
                "height_mm",
                // later for display
                "model_nb",
                "msp_usd",
                "link_online"
            )
            ->get()
            // making it as map key id to antenna
            ->mapWithKeys(
                function ($item) {
                    return [$item->id => $item];
                }
            );
        $generatedSerial = "";
        $isCacheAllowed = SettingWebLara::isCacheAllowed();

        // check if cached and handle auto return value
        if ($isCacheAllowed) {
            $oldCachedResult = CachedResult::cachedResult(
                $technology,
                $port,
                $band,
                $max_height,
                $antenna_per_sector,
                $antenna_preferred,
                $generatedSerial
            );
        }

        $AntennaSolution = array();
        $AntennaSolutionIDS = array();
        $totalTechNbPorts = array_sum($port);
        $totalNbPorts = $totalTechNbPorts;
        $msg = "";
        if (
            $isCacheAllowed
            && !$load_more
            && isset($oldCachedResult)
            && $oldCachedResult->antennas_count == Antennas::count()
        ) {
            // if cached and no change in antennas table
            // do load them from serialized array
            $oldCachedResult->unserializeAndLoadSolution(
                $AntennaSolutionIDS,
                $allAntennasBandsMap,
                $AntennaSolution
            );
            $saveCachedResult = $oldCachedResult;
        } else {
            // end if not cached
            if (!isset($oldCachedResult)) {
                $saveCachedResult = new CachedResult();
                $saveCachedResult->combination_nb = 0;
                $saveCachedResult->sum_ports = 0;
                if (Auth::check()) {
                    $saveCachedResult->email = Auth::user()->email;
                    $saveCachedResult->type = Auth::user()->type;
                }
            } else {
                // this is used to add more combinations
                $saveCachedResult = $oldCachedResult;
            }
            $msg = "";
            $beginRowFrom = $saveCachedResult->combination_nb;
            // trying to compute solution such all ports in all antennas
            // are filled with no waste i.e. $totalNbPorts = $totalTechNbPorts;
            $AntennaSolution =  AnalyserController::_solutionCalculator(
                $totalNbPorts,
                $totalTechNbPorts,
                $port,
                $band,
                $max_height,
                $antenna_per_sector,
                $antenna_preferred,
                $saveCachedResult,
                $AntennaSolutionIDS,
                $allAntennasBandsMap
            );
            // if no solution found trying to found solution
            // where waste is allowed to be 2 ports
            // also do not enter if there is cached result
            // with sum ports no waste
            if (
                count($AntennaSolution) == 0
                && $saveCachedResult->sum_ports != $totalNbPorts
            ) {
                // trying to add 2 free ports
                $totalNbPorts += 2;
                // resetting combination number to same as previous begin
                $saveCachedResult->combination_nb = $beginRowFrom;
                $AntennaSolution = AnalyserController::_solutionCalculator(
                    $totalNbPorts,
                    $totalTechNbPorts,
                    $port,
                    $band,
                    $max_height,
                    $antenna_per_sector,
                    $antenna_preferred,
                    $saveCachedResult,
                    $AntennaSolutionIDS,
                    $allAntennasBandsMap
                );
                if (count($AntennaSolution) == 0) {
                    $msg .= " Also tried to add 2 Free ports with no chance !";
                }
            }
            $saveCachedResult->query_form = $generatedSerial;
            if ($load_more && $isCacheAllowed) {
                $tempIDS = array();
                $saveCachedResult->unserializeAndLoadSolution(
                    $tempIDS,
                    $allAntennasBandsMap,
                    $AntennaSolution
                );
                if (count($tempIDS) > 0) {
                    array_push($AntennaSolutionIDS, ...$tempIDS);
                }
            }
            $saveCachedResult->response_ids = serialize($AntennaSolutionIDS);
            if (count($AntennaSolution) > 0 && $totalNbPorts == array_sum($port)) {
                // if some how a good solution with original ports number
                // stop searching in any other bigger waste solution
                $saveCachedResult->sum_ports = $totalNbPorts;
                $saveCachedResult->solution_count = count($AntennaSolution);
            }
            $saveCachedResult->antennas_count = Antennas::count();
            if ($isCacheAllowed) {
                $saveCachedResult->save();
            }
        }

        $msg .= "---- " . count($AntennaSolution)
            . " ----  Set been Filtered From -- "
            . $saveCachedResult->combination_nb . " -- possibilities. ";
        $msg .= "<br>";
        if (!$saveCachedResult->state_finish) {
            $msg .= " You can press load link to generate more solutions";
            // href=' . $request->fullUrlWithQuery(["load" => true]) .
            $msg .=
                '<a class="btn-sm btn-danger btn-sm waves-effect
                  btn-outline-danger load-link one-time"
                     href=/result?' . $request->fullUrlWithQuery(["load" => true])
                . '>
                Load more <i class="fas fa-truck"></i></a><br>';
        }

        // computing total ports of antenna solution
        if (count($AntennaSolution) > 0) {
            $totalNbPorts = $AntennaSolution[0][0]->total_nb_ports;
            if ($totalNbPorts > $totalTechNbPorts) {
                $msg .= "<br>Added 2 Free ports to get a solution !";
            }
        }

        // Define how many items we want to be visible in each page
        $perPage = SettingWebLara::getSolutionPerPageResult();

        if ($isCacheAllowed) {


            // paginating items for faster browsing
            // https://arjunphp.com/laravel-5-pagination-array/
            // good for customization:
            // https://laracasts.com/discuss/channels/laravel/custom-pagination-number-of-pages-before-dots
            // Get current page form url e.x. &page=1
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            // return $currentPage;
            // Create a new Laravel collection from the array data
            $itemCollection = collect($AntennaSolution);

            // Slice the collection to get the items to display in current page
            $currentPageItems = $itemCollection->slice(
                ($currentPage * $perPage) - $perPage,
                $perPage
            )->all();

            // Create our paginator and pass it to the view
            $paginatedItems = new LengthAwarePaginator(
                $currentPageItems,
                count($itemCollection),
                $perPage
            );

            // set url path for generated links
            $paginatedItems->setPath($request->fullUrl());

            // $paginatedItems->onEachSide(PHP_INT_MAX);
            $AntennaSolution = $paginatedItems;
        }
        // return view('pages.test', ['items' => $paginatedItems]);

        $msg .= " <br> Took about "
            . DebuggerHelper::pingTime("result") . " seconds.";

        // return DebuggerHelper::getReport("result");
        // return $AntennaSolution->lastPage();
        $AnalyseConfig_link = AnalyserController::analyseConfigUrlGenerator(
            $technology,
            $port,
            $band,
            $antenna_per_sector,
            $antenna_preferred,
            $max_height,
            $AnalyseConfig_link_Example
        );
        return view("analyser.result")
            ->with("AntennaSolution", $AntennaSolution)
            // to make able to return the old view
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("antenna_preferred", $antenna_preferred)
            ->with("max_height", $max_height)
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port)
            ->with("bandSymbols", XgBands::getSymbols($band))
            ->with("info", $msg)
            ->with("AnalyseConfig_link", $AnalyseConfig_link)
            ->with("AnalyseConfig_link_Example", $AnalyseConfig_link_Example)
            ->with("isCacheAllowed", $isCacheAllowed)
            ->with("perPage", $perPage)
            ->with("isLoadMore", !$saveCachedResult->state_finish);
    }

    /**
     * Solution Calculator
     *
     * Given all input form and the sum of ports number of all antennas
     * in solution set, it return (multi-dimensional array) of antennas
     *
     * @param int          $totalNbPorts        The sum of ports in accepted solution
     * @param int          $totalTechNbPorts    The sum of ports of all technologies
     * @param array        $port                Input Form: all ports
     * @param array        $band                Input Form: all bands
     * @param int          $max_height          The maximum accepted height antennas
     *                                          (with error of 10)
     * @param int          $antenna_per_sector  allowed nb of antenna in solution set
     * @param int          $antenna_preferred   priority to this nb and down
     * @param CachedResult $saveCachedResult    Cached result to save
     * @param string       $AntennaSolutionIDS  ids of set solutions
     * @param string       $allAntennasBandsMap Map from id to Antennas
     *
     * @return array (multi-dimensional array) of antennas solution
     */
    private static function _solutionCalculator(
        $totalNbPorts,
        $totalTechNbPorts,
        $port,
        $band,
        $max_height,
        $antenna_per_sector,
        $antenna_preferred,
        &$saveCachedResult,
        &$AntennaSolutionIDS,
        &$allAntennasBandsMap
    ) {
        $max_height += 10;
        $AntennaSolution = array();
        $AntennaMaxOrder = array();
        // default was 50000
        $LimitRow = SettingWebLara::getLimitRowPerQuery();
        // sort array based on ports
        // so when testing combinations starting with biggest ports
        // is better so tech with less ports do not take the place of
        // bigger one, in another say let's get rid of the big problem first
        // a new research made show that sorting antennas ports must
        // differ than sorting tech ports so here sort systemG by decreasing
        // ports and antennas ports later on by increasing ports
        // additional details check: simple algorithm approach.docx at
        // https://drive.google.com/open?id=10pqhu4wnlxTAlBCEZZPNn3DEWGYh3Bd6
        // TODO think
        foreach ($port as $key => $value) {
            $systemG[] = [$port[$key], $band[$key]];
        }
        usort(
            $systemG,
            function ($a, $b) {
                return $b[0] <=> $a[0];
            }
        );
        $colSystemG = collect($systemG);
        $port = $colSystemG->pluck(0)->toArray();
        $band = $colSystemG->pluck(1)->toArray();
        $bandInfo = XgBands::getFullInfoFromIds($band);

        // start from preferred antenna number then loop over until solution found
        $AntennaMaxOrder[] = $antenna_preferred;
        for ($i = 1; $i <= $antenna_per_sector; $i++) {
            if ($i != $AntennaMaxOrder) {
                $AntennaMaxOrder[] = $i;
            }
        }
        foreach ($AntennaMaxOrder as $key => $maxAntenna) {
            // forming possible combination based on number of ports
            // each of these combination represent a set of antennas id such that
            // their total number of ports is equals to total number of ports of
            // technologies we have which is stored in $totalNbPorts
            $possibleCombination = AnalyserController::_combinationGenerator(
                $max_height,
                $maxAntenna,
                $totalNbPorts,
                $saveCachedResult->combination_nb,
                $LimitRow
            );
            DebuggerHelper::startRecording("filtering combination");

            foreach ($possibleCombination as $key => $value) {
                $antennaSet = array();
                foreach ($value as $key2 => $anID) {
                    $antennaSet[] = $allAntennasBandsMap[$anID];
                }
                if (AnalyserController::_isValidSetAntenna(
                    $antennaSet,
                    $port,
                    $bandInfo,
                    $totalTechNbPorts
                )) {
                    $AntennaSolution[] = $antennaSet;
                }
            }
            if (count($AntennaSolution) > 0) {
                break;
            }
        }
        DebuggerHelper::addMsg(
            DebuggerHelper::pingReport("filtering combination"),
            "result"
        );

        // saving ids alone for later caching
        foreach ($AntennaSolution as $key => $value) {
            $antennaSetIDS = array();
            foreach ($value as $key2 => $anAntenna) {
                $antennaSetIDS[] = $anAntenna->id;
            }
            $AntennaSolutionIDS[] = $antennaSetIDS;
        }

        $saveCachedResult->combination_nb += count($possibleCombination);
        if (count($possibleCombination) == $LimitRow) {
            $saveCachedResult->state_finish = false;
        } else {
            $saveCachedResult->state_finish = true;
        }
        return $AntennaSolution;
    }
    /**
     * Antennas[ ] tester vs Technologies[ ]
     *
     * Given array of Antennas, and array of system technology (ports[]+bands[])
     * Test if every system do feet somewhere in any antennas.
     *
     * @param array $AntennaSet   All antenna to test against
     * @param array $port         All ports of technologies in same order with $band
     * @param array $bandInfo     All bands models of Tech in same order with $port
     * @param int   $totalNbPorts The total number of ports of all system
     *                            It is equal to array_sum($port).. sent with
     *                            parameter for performance reason
     *
     * @return bool return wherever this set meet condition or not
     */
    private static function _isValidSetAntenna(
        &$AntennaSet,
        &$port,
        &$bandInfo,
        $totalNbPorts
    ) {
        // Bands was earlier defined as collection and accessed with magic function
        // ->Bands when mutator and accessors used

        $allBands = array();
        foreach ($AntennaSet as $key => $value) {
            // https://stackoverflow.com/questions/4268871/php-append-one-array-to-another-not-array-push-or
            array_push($allBands, ...$value->Bands);
        }


        // Check later if decreasing sort is useful
        // at low system number it is less useful
        // but later on much system number it can low time
        // since it's comparing directly highest port with hightest
        // total band ports that only if systemG is sorted by decreasing
        // order and that what is done with given input
        // need more testing
        // https://stackoverflow.com/questions/2699086/how-to-sort-multi-dimensional-array-by-value
        // sorting bands in increasing order of total ports:
        // to keep as long as possible same ports bandwidth
        // together unused in antenna for the case that another
        // system techno may need them in same antenna example:
        // (2G, 4 ports, 900) and (2G, 2 ports, 900)
        usort(
            $allBands,
            function ($a, $b) {
                // current state increasing order
                // with system input ports also decreasing order
                return $a['totalPorts'] <=> $b['totalPorts'];
            }
        );
        foreach ($port as $key => $valuePort) {
            $found = false;

            foreach ($allBands as $i => &$bandItem) {

                if (
                    $bandInfo[$key]->minFreq >= $bandItem['min']
                    && $bandInfo[$key]->maxFreq <= $bandItem['max']
                    && $bandItem['totalPorts'] >= $valuePort
                ) {
                    $bandItem['totalPorts'] -= $valuePort;
                    $totalNbPorts -= $valuePort;
                    // for a faster loop in future
                    // https://stackoverflow.com/questions/2304570/how-to-delete-object-from-array-inside-foreach-loop
                    if ($bandItem['totalPorts'] == 0) {
                        unset($allBands[$i]);
                    }
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                // for sure a false return
                // because totalNbPorts != 0
                break;
            }
        }
        if ($totalNbPorts == 0) {
            return true;
        }
        return false;
    }

    /**
     * Generator Function
     *
     * Given array of Antennas source, and number of sum ports,
     * it return an array of antennas id set (multi-dimensional array)
     * where each set have a total number of ports equal to given parameter
     *
     * @param int $max_height       The max height to consider
     * @param int $maxAntennaPerSet The length of set antenna to form
     * @param int $sumPorts         The number of ports which the set
     *                              of antennas sum ports have
     * @param int $startFrom        Row to start from all combinations
     * @param int $LimitRow         Limit Row in case of overHeat
     *
     * @return array return multi-dimensional array set of antennas
     */
    private static function _combinationGenerator(
        $max_height,
        $maxAntennaPerSet,
        $sumPorts,
        $startFrom,
        $LimitRow
    ) {
        // query explicit example
        // note different name of query column is important so when stored in
        // php array don't get merged
        // $allAntennas = DB::select(
        //     'SELECT
        //     a1.`id` AS id_1,
        //     a2.`id` AS id_2
        //     FROM `antennas` a1,
        //     `antennas` a2
        //     WHERE a1.`height_mm` <= ?
        //     AND a2.`height_mm` <= ?
        //     AND a1.`id` >= a2.`id`
        //     AND (a1.`total_nb_ports` + a2.`total_nb_ports`) = ?  LIMIT 0,50000',
        //     [$max_height, $max_height, $sumPorts]
        // );
        $query = 'SELECT';
        $queryBinding = array();
        for ($i = 1; $i <= $maxAntennaPerSet; $i++) {
            $query .= ' a' . $i . '.`id` AS i' . $i;
            if ($i != $maxAntennaPerSet) {
                $query .= ',';
            }
        }
        $query .= " FROM";
        for ($i = 1; $i <= $maxAntennaPerSet; $i++) {
            $query .= ' `antennas` a' . $i;
            if ($i != $maxAntennaPerSet) {
                $query .= ',';
            }
        }
        $query .= " WHERE";

        // getting only antenna that have sum ports as needed
        $query .= ' (';
        for ($i = 1; $i <= $maxAntennaPerSet; $i++) {
            $query .= 'a' . $i . '.`total_nb_ports`';
            if ($i != $maxAntennaPerSet) {
                $query .= ' +';
            }
        }
        $query .= ') = ?';
        $queryBinding[] = $sumPorts;

        // Filtering by height
        if ($max_height != PHP_INT_MAX) {
            $query .= ' AND';
            for ($i = 1; $i <= $maxAntennaPerSet; $i++) {
                $query .= ' a' . $i . '.`height_mm` <= ?';
                $queryBinding[] = $max_height;
                if ($i != $maxAntennaPerSet) {
                    $query .= ' AND';
                }
            }
        }

        // Preventing repeat like 2 2 4 and 2 4 2...
        if ($maxAntennaPerSet > 1) {
            $query .= ' AND';
            for ($i = 1; $i < $maxAntennaPerSet; $i++) {
                $query .= ' a' . $i . '.`id` >= a'
                    . ($i + 1) . '.`id`';
                if ($i != $maxAntennaPerSet - 1) {
                    $query .= ' AND';
                }
            }
        }
        $temp = $query;
        $query .= '  Limit ' . $startFrom . "," . $LimitRow;

        DebuggerHelper::startRecording("query combination");
        $allAntennas = DB::select($query, $queryBinding);

        DebuggerHelper::addMsg(
            DebuggerHelper::pingReport("query combination"),
            "result"
        );
        DebuggerHelper::addMsg(
            "query is " . $query . "  and binding parameter are "
                . implode(",", $queryBinding),
            "result"
        );

        $possibleCombination = array();
        foreach ($allAntennas as $key => $value) {
            $possibleCombination[] = array_values((get_object_vars($value)));
            unset($allAntennas[$key]);
        }
        $possibleCombination = array_values($possibleCombination);

        // //  TODO
        // return DebuggerHelper::pingReport()
        // . " count is " . count($possibleCombination);
        return $possibleCombination;
    }



    /**
     * Receive form information to analyse them and return result
     *
     * @param Request $request antenna_per_sector | antenna_preferred
     *                         | technology[] | port[] | band[]
     *
     * @return View The result view
     */
    public function editForm(Request $request)
    {
        // about passing array as string value in get method
        // https://www.pontikis.net/tip/?id=11
        // return $request->all();
        $technology = unserialize(base64_decode($request->input("technology")));
        $port = unserialize(base64_decode($request->input("port")));
        $band = unserialize(base64_decode($request->input("band")));
        $antenna_per_sector = $request->input("antenna_per_sector");
        $antenna_preferred = $request->input("antenna_preferred");
        $max_height = $request->input("max_height");
        // just to prettily look
        if ($max_height == PHP_INT_MAX) {
            $max_height = "";
        }
        // This return view with predefined column and stuff
        return view('welcome')
            ->with("bands", XgBands::getBands())
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("antenna_preferred", $antenna_preferred)
            ->with("max_height", $max_height)
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port);
    }

    /**
     * Receive form information and id of antennas to analyse and generate chart
     *
     * @param Request $request            Empty
     * @param int     $confNb             The configuration number
     * @param string  $antennasSetIds     all technology imploded with '_'
     * @param string  $technology         all technology imploded with '_'
     * @param string  $port               all ports imploded with '_'
     * @param string  $band               all bands imploded with '_'
     * @param int     $antenna_per_sector allowed nb of antenna in solution set
     * @param int     $antenna_preferred  priority to this nb and down
     * @param int     $max_height         The maximum accepted height antennas
     *                                    (with error of 10)
     *
     * @return View The result view
     */
    public function analyseConfig(
        Request $request,
        $confNb,
        $antennasSetIds,
        $technology,
        $port,
        $band,
        $antenna_per_sector,
        $antenna_preferred,
        $max_height = null
    ) {
        // about passing array as string value in get method
        // https://www.pontikis.net/tip/?id=11
        // return $request->all();
        $antennasSetIds = explode("_", $antennasSetIds);
        $technology = explode("_", $technology);
        $port =  explode("_", $port);
        $band = explode("_", $band);
        $bandInfo = XgBands::getFullInfoFromIds($band);
        // will contain an associative array from antenna label
        // to antennas see later on definition
        $AntennaSet = array();
        $totalNbPorts = array_sum($port);
        $i = 0;
        $colors = array("FDEDEC", "F5B7B1", "DC3545");
        $j = 1;
        if (count($antennasSetIds) == 0) {
            return redirect()->back()
                ->with("error", "Must Check at least one antennas.");
        }
        if (count($antennasSetIds) > 0 && $antennasSetIds[0] == -1) {
            // automatic show result
            $queries = [
                "antenna_per_sector" => $antenna_per_sector,
                "antenna_preferred" => $antenna_preferred,
                "max_height" => $max_height,
                "technology" => $technology,
                "port" => $port,
                "band" => $band
            ];
            if ($request->has("load")) {
                $queries["load"] = "true";
            }
            $showResultRequest = new Request($queries);
            return $this->showResult($showResultRequest);
        }
        foreach ($antennasSetIds as $key => $id) {
            $curLabel = "A" . $j++;
            $AntennaSet[$curLabel] = Antennas::find($id);
            $AntennaSet[$curLabel]["label"] = $curLabel;
            if (count($antennasSetIds) > 3) {
                $curColor = AnalyserController::_randomColor();
            } else {
                $curColor = $colors[$i++];
            }
            $invertColor = AnalyserController::_colorInverse($curColor);
            $AntennaSet[$curLabel]["color"] = '#' . $curColor;
            $AntennaSet[$curLabel]["invColor"] = '#' . $invertColor;
        }

        // test defined original _isValidSetAntenna
        // return var_dump($this::_isValidSetAntenna(
        //     $AntennaSet,
        //     $port,
        //     $bandInfo,
        //     $totalNbPorts
        // ));

        // return $AntennaSet;
        // just to prettily look
        if (!isset($max_height) || $max_height == PHP_INT_MAX) {
            $max_height = "";
        }

        // Do distribute technology on antennas while
        // conserving where each technology belong

        // allBands will contain all band with additional variable parentAntennaID
        // pointing to which antenna it belong
        $allBands = array();
        // antennaLabels associative array from id to label for display
        $antennaLabels = array();
        $antennaLabelsColors = array();
        $techToAntenna = array();

        foreach ($AntennaSet as $key => $antenna) {
            foreach ($antenna->Bands as $key2 => $bandItem) {
                $bandItem["parentAntennaLabel"] = $antenna->label;
                $bandItem["parentAntennaID"] = $antenna->id;
                $allBands[] = $bandItem;
            }
        }
        // return $AntennaSet;
        // return $allBands;
        usort(
            $allBands,
            function ($a, $b) {
                // increasing sort of antennas ports
                return $a['totalPorts'] <=> $b['totalPorts'];
            }
        );
        // return $allBands;
        // decreasing sort of technologies ports
        $systemG = array();
        foreach ($technology as $key => $value) {
            $systemG[] = [
                (int) $technology[$key],
                (int) $port[$key], (int) $band[$key]
            ];
        }
        usort(
            $systemG,
            function ($a, $b) {
                return $a[1] <=> $b[1];
            }
        );
        $colSystemG = collect($systemG);
        $technology = $colSystemG->pluck(0)->toArray();
        $port = $colSystemG->pluck(1)->toArray();
        $band = $colSystemG->pluck(2)->toArray();
        // return $systemG;


        $usedPortsGraph = array();
        $wastePortsGraph = array();
        $usedPorts = 0;
        $notFoundLabel = "No Space";
        foreach ($port as $key => $valuePort) {
            $found = false;

            foreach ($allBands as $i => &$bandItem) {
                $curAntLabel = $bandItem["parentAntennaLabel"];
                $curAntColor = $AntennaSet[$curAntLabel]["color"];
                $curAntInvColor = $AntennaSet[$curAntLabel]["invColor"];
                if (
                    $bandInfo[$key]->minFreq >= $bandItem['min']
                    && $bandInfo[$key]->maxFreq <= $bandItem['max']
                    && $bandItem['totalPorts'] >= $valuePort
                ) {
                    $bandItem['totalPorts'] -= $valuePort;
                    $totalNbPorts -= $valuePort;
                    $usedPorts += $valuePort;
                    // For graph associations views
                    $usedPortsGraph[$curAntLabel]["label"] = $curAntLabel;
                    if (!isset($usedPortsGraph[$curAntLabel]["y"])) {
                        $usedPortsGraph[$curAntLabel]["y"] = $valuePort;
                    } else {
                        $usedPortsGraph[$curAntLabel]["y"] += $valuePort;
                    }
                    $usedPortsGraph[$curAntLabel]["color"] = $curAntColor;

                    // For table associations view
                    $techToAntenna[$key]["id"] = $bandItem["parentAntennaID"];
                    $techToAntenna[$key]["label"] = $curAntLabel;
                    $techToAntenna[$key]["color"] = $curAntColor;
                    $techToAntenna[$key]["invColor"] = $curAntInvColor;


                    if ($bandItem['totalPorts'] == 0) {
                        unset($allBands[$i]);
                    }
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                // For graph associations views
                $usedPortsGraph[$notFoundLabel]["label"] = $notFoundLabel;
                if (!isset($usedPortsGraph[$notFoundLabel]["y"])) {
                    $usedPortsGraph[$notFoundLabel]["y"] = $valuePort;
                } else {
                    $usedPortsGraph[$notFoundLabel]["y"] += $valuePort;
                }
                $usedPortsGraph[$notFoundLabel]["color"] = "#ccffcc";
                // For table associations view
                $techToAntenna[$key]["id"] = -1;
                $techToAntenna[$key]["label"] = "No space available";
                $techToAntenna[$key]["color"]
                    = "ccffcc";
                $techToAntenna[$key]["invColor"]
                    = "ffffff";
            }
        }
        $unusedWastePorts = 0;
        foreach ($allBands as $key => &$bandItem) {
            if ($bandItem["totalPorts"] == 0) {
                continue;
            }
            $unusedWastePorts += $bandItem["totalPorts"];
            $curAntLabel = $bandItem["parentAntennaLabel"];
            // For graph waste views
            $wastePortsGraph[$curAntLabel]["label"] = $curAntLabel;
            if (!isset($wastePortsGraph[$curAntLabel]["y"])) {
                $wastePortsGraph[$curAntLabel]["y"] = $bandItem["totalPorts"];
            } else {
                $wastePortsGraph[$curAntLabel]["y"] += $bandItem["totalPorts"];
            }
            $wastePortsGraph[$curAntLabel]["color"]
                = $AntennaSet[$curAntLabel]["color"];
        }
        // Sorting technologies based on antennas they belong
        // sorting array to unify request
        $systemG = array();
        foreach ($technology as $key => $value) {
            $systemG[] = [
                (int) $technology[$key],
                (int) $port[$key], (int) $band[$key], $techToAntenna[$key]
            ];
        }
        // prettily look: make No Space label the last one
        usort(
            $usedPortsGraph,
            function ($a, $b) {
                return $a["label"] <=> $b["label"];
            }
        );
        usort(
            $wastePortsGraph,
            function ($a, $b) {
                return $a["label"] <=> $b["label"];
            }
        );
        usort(
            $systemG,
            function ($a, $b) {
                return $a[3]["label"] <=> $b[3]["label"];
            }
        );
        $colSystemG = collect($systemG);
        $technology = $colSystemG->pluck(0)->toArray();
        $port = $colSystemG->pluck(1)->toArray();
        $band = $colSystemG->pluck(2)->toArray();
        $techToAntenna = $colSystemG->pluck(3)->toArray();

        $bandSymbols = XgBands::getSymbols($band);
        // return $usedPortsGraph;
        $wastePortsGraph = array_values($wastePortsGraph);
        $usedPortsGraph = array_values($usedPortsGraph);
        // This return view with predefined column and stuff
        return view('analyser.analyseConfig')
            ->with("confNb", $confNb)
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("antenna_preferred", $antenna_preferred)
            ->with("max_height", $max_height)
            ->with("technology", $technology)
            ->with("techToAntenna", $techToAntenna)
            ->with("band", $band)
            ->with("bandSymbols", $bandSymbols)
            ->with("port", $port)
            ->with("unusedWastePorts", $unusedWastePorts)
            ->with("usedPorts", $usedPorts)
            ->with("usedPortsGraph", json_encode($usedPortsGraph))
            ->with("wastePortsGraph", json_encode($wastePortsGraph))
            ->with("antennaLabels", $antennaLabels)
            ->with("AntennaSet", $AntennaSet);
    }

    /**
     * Receive Full url of analyser config with new set of antennas ids
     *
     * @param Request $request antennasSetIds[] | quantity[]
     *                         | previousUrl | previousSetIDS
     *
     * @return Redirect redirect url to analyseConfig
     */
    public function analyseConfigHelper(Request $request)
    {
        $antennasSetIds = $request->input("antennasSetIds");
        $quantity = $request->input("quantity");
        $previousUrl = $request->input("previousUrl");
        $previousSetIDS = $request->input("previousSetIDS");
        if (
            !isset($antennasSetIds) || !isset($quantity)
            || count($quantity) != count($antennasSetIds)
        ) {
            return redirect()->back()
                ->with(
                    "error",
                    "Something went wrong," .
                        " At least one antenna Must be selected."
                );
        }
        $newAntennasSetIds = array();
        foreach ($antennasSetIds as $key => $value) {
            for ($i = 0; $i < $quantity[$key]; $i++) {
                $newAntennasSetIds[] = $value;
            }
        }

        $pattern = "#Ids=(-?[[:digit:]]*_?)*#";
        $replacement = "Ids=" . implode("_", $newAntennasSetIds);
        $newUrl = preg_replace($pattern, $replacement, $previousUrl, 1);
        return redirect($newUrl);
    }

    /**
     * Receive Full url of analyser config and fill corresponding variables
     *
     * @param string $url                in the form as web.php route of
     *                                   AnalyserController@AnalyseConfig
     * @param string $technology         all technology imploded with '_'
     * @param string $port               all ports imploded with '_'
     * @param string $band               all bands imploded with '_'
     * @param string $bandSymbols        all tech-band symbols generated
     * @param int    $confNb             The configuration number
     * @param string $antennasSetIds     all technology imploded with '_'
     * @param int    $antenna_per_sector allowed nb of antenna in solution set
     * @param int    $antenna_preferred  priority to this nb and down
     * @param int    $max_height         The maximum accepted height antennas
     *                                   (with error of 10)
     *
     * @return array Parsed array of
     */
    public static function analyseConfigUrlParser(
        string $url,
        &$technology = null,
        &$port = null,
        &$band = null,
        &$bandSymbols = null,
        &$confNb = null,
        &$antennasSetIds = null,
        &$antenna_per_sector = null,
        &$antenna_preferred = null,
        &$max_height = null
    ) {
        /**
         * \d stand for digit [0-9]
         * (pattern)    surrounding pattern with
         *             parenthesis will return it in result array index
         * (<name>pattern) return pattern in array associative with key name
         * Quantifier
         * \?           question mark without \ stand for optional existence
         * *            '*' Asterisk  stand for 0..any occurrence
         */
        $ac = "(-?\d_?)*"; // array concatenated with _ integer pattern
        $pattern = "#.*/Conf=(?<confNb>$ac)"
            . "/Ids=(?<antennasSetIds>$ac)"
            . "/Tech=(?<technology>$ac)"
            . "/Pr=(?<port>$ac)"
            . "/Bd=(?<band>$ac)"
            . "/Sec=(?<antenna_per_sector>$ac)"
            . "/Pfd=(?<antenna_preferred>$ac)"
            . "/Het/?((?<max_height>$ac))?#";
        preg_match($pattern, $url, $result);
        // return $previousUrl;
        $confNb = $result["confNb"];
        $antennasSetIds = explode("_", $result["antennasSetIds"]);
        $technology = explode("_", $result["technology"]);
        $port = explode("_", $result["port"]);
        $band = explode("_", $result["band"]);
        $antenna_per_sector = $result["antenna_per_sector"];
        $antenna_preferred = $result["antenna_preferred"];
        $max_height = $result["max_height"];
        $bandSymbols = XgBands::getSymbols($band);
        return $result;
    }

    /**
     * Url Generator
     *
     * Generate partial url of analyser config beginning from 'Tech/...'
     *  from given variables in the form
     *              as web.php route ofAnalyserController@AnalyseConfig
     *
     * @param array  $technology         all technology[]
     * @param array  $port               all ports[]
     * @param array  $band               all bands[]
     * @param int    $antenna_per_sector allowed nb of antenna in solution set
     * @param int    $antenna_preferred  priority to this nb and down
     * @param int    $max_height         The maximum accepted height antennas
     *                                   (with error of 10)
     * @param string $fullUrlTemplate    Full url template independent of id and conf
     * @param bool   $doReturnFullUrl    Do return full Url ?
     *
     * @return array Parsed array of
     */
    public static function analyseConfigUrlGenerator(
        $technology,
        $port,
        $band,
        $antenna_per_sector,
        $antenna_preferred,
        $max_height,
        &$fullUrlTemplate = "",
        $doReturnFullUrl = false
    ) {
        $AnalyseConfig_link =   "Tech=" . implode("_", $technology)
            . "/Pr=" . implode("_", $port)
            . "/Bd=" . implode("_", $band)
            . "/Sec=" . $antenna_per_sector
            . "/Pfd=" . $antenna_preferred
            . "/Het";
        if ($max_height != PHP_INT_MAX) {
            $AnalyseConfig_link .= "/" . $max_height;
        }
        $fullUrlTemplate = "/AnalyseConfig/Conf=0/Ids=-1/" . $AnalyseConfig_link;
        if ($doReturnFullUrl) {
            return $fullUrlTemplate;
        }
        return $AnalyseConfig_link;
    }


    /**
     * Return radom part color
     *
     * Https://stackoverflow.com/questions/5614530/generating-a-random-hex-color-code-with-php
     *
     * @return string HexPart color
     */
    private static function _randomColorPart()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    /**
     * Return radom part color
     *
     * @return string Hex color
     */
    private static function _randomColor()
    {
        return AnalyserController::_randomColorPart()
            . AnalyserController::_randomColorPart()
            . AnalyserController::_randomColorPart();
    }

    /**
     * Return the inverted color
     *
     * Https://stackoverflow.com/questions/3942878/how-to-decide-font-color-in-white-or-black-depending-on-background-color/3943023#3943023
     *
     * @param string $color Hex color
     *
     * @return string Hex color
     */
    private static function _colorInverse($color)
    {
        $color = str_replace('#', '', $color);
        if (strlen($color) != 6) {
            return '000000';
        }
        $rgb = '';
        $rgbDec = array();
        for ($x = 0; $x < 3; $x++) {
            $rgbDec[] = hexdec(substr($color, (2 * $x), 2));
            $c = 255 - hexdec(substr($color, (2 * $x), 2));
            $c = ($c < 0) ? 0 : dechex($c);
            $rgb .= (strlen($c) < 2) ? '0' . $c : $c;
        }
        $red = $rgbDec[0];
        $green = $rgbDec[1];
        $blue = $rgbDec[2];
        if (($red * 0.299 + $green * 0.587 + $blue * 0.114) > 186) {
            return '000000';
        } else {
            return 'ffffff';
        }
    }
}
