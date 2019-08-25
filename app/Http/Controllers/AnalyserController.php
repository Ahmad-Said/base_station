<?php

namespace App\Http\Controllers;

use Auth;
use App\prices;
use App\XgBands;
use App\Antennas;
use App\CachedResult;
use App\DebuggerHelper;
use function Psy\debug;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use function Opis\Closure\serialize;
use function Opis\Closure\unserialize;
use PHPUnit\Framework\Constraint\IsFalse;
use Illuminate\Pagination\LengthAwarePaginator;
class AnalyserController extends Controller
{
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
     *                         | technology[] | port[] | band[]
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
        // $agent2 = new Agent();
        // $agent2->isTablet()
        // return var_dump($agent2->isMobile());
        DebuggerHelper::startRecording("result");
        $technology = $request->input("technology");
        $port = $request->input("port");
        $band = $request->input("band");
        $antenna_per_sector = $request->input("antenna_per_sector");
        $max_height = $request->input("max_height");
        $antenna_preferred = $request->input("antenna_preferred");
        $load_more = $request->session()->get("load");
        $request->session()->forget("load");
        if (!isset($max_height)) {
            $max_height = PHP_INT_MAX;
        }
        if (!isset($antenna_preferred)) {
            $antenna_preferred = 1;
        }
        // $request->session()->forget("load");
        // return var_dump($request->session()->get("load"));
        if (!isset($load_more)) {
            $load_more = false;
        }
        $allAntennasBandsMap = Antennas::where(
            [
                ['Total #RF ports', "<=", array_sum($port) + 2],
                ['Height (mm)', "<=",  $max_height]
            ]
        )
            ->select(
                "xxx",
                "antennaId",
                "Total #RF ports",
                "#ports (<1GHz)",
                "#ports (1-3GHz)",
                "#ports (>3GHz )",
                "Height (mm)",
                // later for display
                "Link to product datasheet"
            )
            ->get()
            // making it as map key id to antenna
            ->mapWithKeys(
                function ($item) {
                    return [$item->antennaId => $item];
                }
            );
        // return $allAntennasBandsMap;
        //    $test =  $allAntennasBandsMap[62]->Bands[0];
        //    $test["totalPorts"]-=2;
        //  return    $allAntennasBandsMap[62]->Bands[0];
        // return var_dump($allAntennasBandsMap[62]->Bands);
        $generatedSerial = "";
        // check if cached and handle auto return value
        $oldCachedResult = AnalyserController::cachedResult(
            $technology,
            $port,
            $band,
            $max_height,
            $antenna_per_sector,
            $antenna_preferred,
            $generatedSerial
        );
        $AntennaSolution = array();
        $AntennaSolutionIDS = array();
        $msg = "";
        if (
            !$load_more
            && isset($oldCachedResult)
            && $oldCachedResult->antennas_count == Antennas::count()
        ) {
            // if cached and no change in antennas table
            // do load them from serialized array
            $oldCachedResult->unserializeAndLoad(
                $AntennaSolutionIDS,
                $allAntennasBandsMap,
                $AntennaSolution
            );
            // $AntennaSolutionIDS = unserialize($oldCachedResult['response_ids']);

            // foreach ($AntennaSolutionIDS as $key => $setIDS) {
            //     $setAntenna = array();
            //     foreach ($setIDS as $key2 => $id) {
            //         $setAntenna[] = $allAntennasBandsMap[$id];
            //     }
            //     $AntennaSolution[] = $setAntenna;
            // }
            $saveCachedResult = $oldCachedResult;
        } else {
            // end if not cached
            if (!isset($oldCachedResult)) {
                $saveCachedResult = new CachedResult();
                $saveCachedResult->combination_nb = 0;
                $saveCachedResult->sum_ports = 0;
            } else {
                // this is used to add more combinations
                $saveCachedResult = $oldCachedResult;
            }
            $msg = "";

            // trying to compute solution such all ports in all antennas
            // are filled with no waste
            $totalNbPorts = array_sum($port);
            $AntennaSolution = AnalyserController::_solutionCalculator(
                $totalNbPorts,
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
                $totalNbPorts += 2;
                $AntennaSolution = AnalyserController::_solutionCalculator(
                    $totalNbPorts,
                    $port,
                    $band,
                    $max_height,
                    $antenna_per_sector,
                    $antenna_preferred,
                    $saveCachedResult,
                    $AntennaSolutionIDS,
                    $allAntennasBandsMap
                );
                if (count($AntennaSolution) > 0) {
                    $msg .= "Added 2 Free ports to get a solution !";
                } else {
                    $msg .= " Also tried to add 2 Free ports with no chance !";
                }
            }
            $saveCachedResult->query_form = $generatedSerial;
            if ($load_more) {
                $tempIDS = array();
                $saveCachedResult->unserializeAndLoad(
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
            }
            $saveCachedResult->antennas_count = Antennas::count();
            $saveCachedResult->save();
        }

        $msg .= "---- " . count($AntennaSolution)
            . " ----  Set been Filtered From -- "
            . $saveCachedResult->combination_nb . " -- possibilities. ";
        $msg .= "<br>";
        if (!$saveCachedResult->state_finish) {
            $msg .= " You can press load link to generate more solutions";
            $msg .=
                '<a class="btn-sm btn-danger btn-sm waves-effect
                  btn-outline-danger load-link one-time"
                     href=' . $request->fullUrlWithQuery(["load" => true]) .
                '>
                Load more <i class="fas fa-truck"></i></a><br>';
        }
        // TODO debug messages
        // $msg .= DebuggerHelper::pingReport("result");

        // // generating price
        // $antennasIDtoPrice = prices::select(
        //     "antennaId",
        //     "price"
        // )->get()
        //     // making it as map key id to antenna
        //     ->mapWithKeys(
        //         function ($item) {
        //             return [$item->antennaId => $item];
        //         }
        //     );
        // if ( Auth::user()
        //     && (Auth::user()->type=="admin" || Auth::user()->type == "salesman" ) ) {
        //     foreach ( $AntennaSolution as $key => $setSolution ) {
        //         foreach ( $setSolution as $key2 => $antennaItem ) {
        //             if ( isset($antennasIDtoPrice[$antennaItem->antennaId]) ) {
        //                 $AntennaSolution[$key][$key2]["price"] = $antennasIDtoPrice[$antennaItem->antennaId];
        //             } else {
        //                 $AntennaSolution[$key][$key2]["price"] = 0;
        //             }
        //         }
        //     }
        // }
        // return $AntennaSolution;



        // paginating items for faster browsing
        // https://arjunphp.com/laravel-5-pagination-array/
        // good for custumization:
        // https://laracasts.com/discuss/channels/laravel/custom-pagination-number-of-pages-before-dots
        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // return $currentPage;
        // Create a new Laravel collection from the array data
        $itemCollection = collect($AntennaSolution);

        // Define how many items we want to be visible in each page
        $perPage = 100;

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

        // set url path for generted links
        $paginatedItems->setPath($request->fullUrl());

        // $paginatedItems->onEachSide(PHP_INT_MAX);
        $AntennaSolution = $paginatedItems;
        // return view('pages.test', ['items' => $paginatedItems]);

        $msg .= " <br> Took about "
            . DebuggerHelper::pingTime("result") . " seconds.";



        // return $AntennaSolution->lastPage();
        return view("analyser\\result")
            ->with("AntennaSolution", $AntennaSolution)
            // to make able to return the old view
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("antenna_preferred", $antenna_preferred)
            ->with("max_height", $max_height)
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port)
            ->with("info", $msg)
            ->with("isLoadMore", !$saveCachedResult->state_finish);
    }

    /**
     * Solution Calculator
     *
     * Given all input form and the sum of ports number of all antennas
     * in solution set, it return (multi-dimensional array) of antennas
     *
     * @param int          $totalNbPorts        The sum of ports in accepted solution
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
        $LimitRow = 50000;
        // sort array based on ports
        // so when testing combinations starting with biggest ports
        // is better for
        foreach ($port as $key => $value) {
            $systemG[] = [$port[$key], $band[$key]];
        }
        usort(
            $systemG,
            function ($a, $b) {
                $retval = $b[0] <=> $a[0];
                return $retval;
            }
        );
        $colSystemG = collect($systemG);
        $port = $colSystemG->pluck(0)->toArray();
        $band = $colSystemG->pluck(1)->toArray();

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
            // return count($possibleCombination);
            // return DebuggerHelper::pingReport();
            // // TODO
            // return $possibleCombination;
            // testing possible combination and adding to solution
            DebuggerHelper::startRecording("filtering combination");
            foreach ($possibleCombination as $key => $value) {
                $antennaSet = array();
                foreach ($value as $key2 => $anID) {
                    $antennaSet[] = $allAntennasBandsMap[$anID];
                }
                if (AnalyserController::_isValidSetAntenna(
                    $antennaSet,
                    $port,
                    $band,
                    $totalNbPorts
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
                $antennaSetIDS[] = $anAntenna->antennaId;
            }
            $AntennaSolutionIDS[] = $antennaSetIDS;
        }

        $saveCachedResult->combination_nb += count($possibleCombination);
        if (count($possibleCombination) == $LimitRow) {
            $saveCachedResult->state_finish = false;
        } else {
            $saveCachedResult->state_finish = true;
        }
        // // TODO
        // return DebuggerHelper::pingReport().count($possibleCombination);
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
     * @param array $band         All bands of technologies in same order with $port
     * @param int   $totalNbPorts The total number of ports of all system
     *                            It is equal to array_sum($port).. sent with
     *                            parameter for performance reason
     *
     * @return bool return wherever this set meet condition or not
     */
    private static function _isValidSetAntenna(
        &$AntennaSet,
        &$port,
        &$band,
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
        // total band ports
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
                $retval = $b['totalPorts'] <=> $a['totalPorts'];
                // if ($retval == 0) {
                //     $retval = $a['min'] <=> $b['min'];
                //     if ($retval == 0) {
                //         $retval = $a['max'] <=> $b['max'];
                //     }
                // }
                return $retval;
            }
        );
        foreach ($port as $key => $valuePort) {
            $found = false;
            // foreach ($allBands as $key2  => $value) {
            // foreach ($allBands as $key3 => $bandItem) {
            for ($i = 0; $i < count($allBands); $i++) {
                // code...
                $bandItem = &$allBands[$i];

                if (
                    $band[$key] >= $bandItem['min']
                    && $band[$key] <= $bandItem['max']
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
            // }
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
        //     a1.`antennaId` AS id_1,
        //     a2.`antennaId` AS id_2
        //     FROM `antennas` a1,
        //     `antennas` a2
        //     WHERE a1.`Height (mm)` <= ?
        //     AND a2.`Height (mm)` <= ?
        //     AND a1.`antennaId` >= a2.`antennaId`
        //     AND (a1.`Total #RF ports` + a2.`Total #RF ports`) = ?',
        //     [$max_height, $max_height, $sumPorts]
        // );
        $query = 'SELECT';
        $queryBinding = array();
        for ($i = 1; $i <= $maxAntennaPerSet; $i++) {
            $query .= ' a' . $i . '.`antennaId` AS i' . $i;
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
            $query .= 'a' . $i . '.`Total #RF ports`';
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
                $query .= ' a' . $i . '.`Height (mm)` <= ?';
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
                $query .= ' a' . $i . '.`antennaId` >= a'
                    . ($i + 1) . '.`antennaId`';
                if ($i != $maxAntennaPerSet - 1) {
                    $query .= ' AND';
                }
            }
        }
        $temp = $query;
        $query .= '  Limit ' . $startFrom . "," . $LimitRow;

        DebuggerHelper::startRecording("query combination");
        $allAntennas = DB::select($query, $queryBinding);
        // if (count($allAntennas) >= $LimitRow) {
        //     $query = $temp . " ORDER by rand() Limit " . $LimitRow;
        //     $allAntennas = DB::select($query, $queryBinding);
        // }
        // return memory_get_usage()/1024/1024;
        // // TODO
        DebuggerHelper::addMsg(
            DebuggerHelper::pingReport("query combination"),
            "result"
        );
        // return DebuggerHelper::pingReport() . " count is " . count($allAntennas);
        // return $query;
        // clearing output from useless data
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
     * Cache result if recently requested
     *
     * @param array $technology         Input Form: all technology
     * @param array $port               Input Form: all ports
     * @param array $band               Input Form: all bands
     * @param int   $max_height         The maximum accepted height antennas
     *                                  (with error of 10)
     * @param int   $antenna_per_sector allowed nb of antenna in solution set
     * @param int   $antenna_preferred  priority to this nb and down
     * @param int   $generatedSerial    id referring to request will be generated
     *
     * @return array result Antenna solution
     */
    public static function cachedResult(
        &$technology,
        &$port,
        &$band,
        $max_height,
        $antenna_per_sector,
        $antenna_preferred,
        &$generatedSerial
    ) {
        $antennaSolution = array();
        // sorting array to unify request
        foreach ($technology as $key => $value) {
            $systemG[] = [
                (int) $technology[$key], (int) $port[$key], (int) $band[$key]
            ];
        }
        usort(
            $systemG,
            function ($a, $b) {
                $retval = $a[0] <=> $b[0];
                if ($retval == 0) {
                    $retval = $a[1] <=> $b[1];
                    if ($retval == 0) {
                        $retval = $a[2] <=> $b[2];
                    }
                }
                return $retval;
            }
        );
        $colSystemG = collect($systemG);
        $technology = $colSystemG->pluck(0)->toArray();
        $port = $colSystemG->pluck(1)->toArray();
        $band = $colSystemG->pluck(2)->toArray();

        $systemG[] = $max_height;
        $systemG[] = $antenna_per_sector;
        $systemG[] = $antenna_preferred;
        $generatedSerial = implode($technology) . ";" .
            implode($port) . ";" . implode($band) . ";" .
            $max_height . ";" . $antenna_per_sector
            . ";" . $antenna_preferred;
        // $generatedSerial = serialize($systemG);
        return CachedResult::find($generatedSerial);
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
}
