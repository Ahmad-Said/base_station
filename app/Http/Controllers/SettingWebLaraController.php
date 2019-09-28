<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Antennas;
use App\CachedResult;
use App\SettingWebLara;
use App\AntennasProvider;
use Illuminate\Http\Request;
use App\AntennasBandsProvider;

class SettingWebLaraController extends Controller
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
     * Show references pages
     *
     * @return view - pages.references -> /references
     */
    public function index()
    {
        if (Auth::user()->type != "admin") {
            return redirect("/home")
                ->with("error", "You are not authorized to view this page!");
        }
        $allSetting = SettingWebLara::getAllSettings();
        return view('analyser.settingWeb')
            ->with("allSetting", $allSetting);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request testing
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isCACHE_RESULT = $request->input("CACHE_RESULT");
        $newLIMIT_ROW_PER_QUERY = $request->input("LIMIT_ROW_PER_QUERY");
        $newLIMIT_SOLUTION_PER_PAGE_RESULT
            = $request->input("LIMIT_SOLUTION_PER_PAGE_RESULT");
        $temp = SettingWebLara::whereSettingName("CACHE_RESULT")->first();
        if (isset($isCACHE_RESULT)) {
            $temp->value = "true";
        } else {
            $temp->value = "false";
        }
        $temp->save();
        SettingWebLara::setLimitRowPerQuery($newLIMIT_ROW_PER_QUERY);
        SettingWebLara::setSolutionPerPageResult($newLIMIT_SOLUTION_PER_PAGE_RESULT);

        $allSetting = SettingWebLara::getAllSettings();
        return view('analyser.settingWeb')
            ->with("allSetting", $allSetting)
            ->with('success', 'Setting Saved');
    }
    /**
     * Get all data from database mysql2 to default database.
     *
     * @param \Illuminate\Http\Request $request testing
     *
     * @return \Illuminate\Http\Response
     */
    public function triggerUpdateProvidedData(Request $request)
    {
        $temp = AntennasProvider::provideDataToAntennasAndBands(true);
        $allSetting = SettingWebLara::getAllSettings();
        return view('analyser.settingWeb')
            ->with("allSetting", $allSetting)
            ->with(
                'success',
                'Data updated to ' . $temp->updated_at->format("d/m/y  h:i A") . '.'
            );
    }

    /**
     * Get all queries
     *
     * @return \Illuminate\Http\Response
     */
    public function getQueriesLog()
    {
        $queriesPerPage = 100;

        $allCachedResult = CachedResult::select(
            [
                "query_form",
                "sum_ports", "state_finish",
                "combination_nb", "solution_count",
                "email", "updated_at"
            ]
        )->orderBy('updated_at', 'desc')->paginate($queriesPerPage);
        $lastQueryDate = CachedResult::max("updated_at");
        $currentPage = $allCachedResult->currentPage();
        $queryNb = $allCachedResult->total() - ($currentPage - 1) * $queriesPerPage;

        $technology = 0;
        $port = 0;
        $band = 0;
        $max_height = 0;
        $antenna_per_sector = 0;
        $antenna_preferred = 0;
        foreach ($allCachedResult->items() as $key => &$itemCache) {
            $itemCache->unserializeGeneratedSerial(
                $technology,
                $port,
                $band,
                $max_height,
                $antenna_per_sector,
                $antenna_preferred
            );
            $itemCache["link"] = AnalyserController::analyseConfigUrlGenerator(
                $technology,
                $port,
                $band,
                $antenna_per_sector,
                $antenna_preferred,
                $max_height,
                $discard,
                true
            );
            $itemCache["tech"] = "";
            for ($i = 0; $i < count($technology); $i++) {
                $itemCache["tech"] .= $technology[$i] . "G";
                if ($i != count($technology) - 1) {
                    $itemCache["tech"] .= ", ";
                } else {
                    $itemCache["tech"] .= ".";
                }
            }
        }
        return view('analyser.queryLog')
            ->with("allCachedResult", $allCachedResult)
            ->with("lastQueryDate", $lastQueryDate)
            ->with("queryNb", $queryNb);
    }

    /**
     * Clear cached result
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCachedResult()
    {
        CachedResult::truncate();
        $allSetting = SettingWebLara::getAllSettings();
        return view('analyser.settingWeb')
            ->with("allSetting", $allSetting)
            ->with('error', 'Cache cleared.');
    }
}
