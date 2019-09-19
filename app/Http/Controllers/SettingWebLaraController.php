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
        return view('pages.settingWeb')
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
        $temp = SettingWebLara::whereSettingName("CACHE_RESULT")->first();
        if (isset($isCACHE_RESULT)) {
            $temp->value = "true";
        } else {
            $temp->value = "false";
        }
        $temp->save();
        SettingWebLara::setLimitRowPerQuery($newLIMIT_ROW_PER_QUERY);

        $allSetting = SettingWebLara::getAllSettings();
        return view('pages.settingWeb')
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
        $temp = AntennasProvider::provideDataToAntennasAndBands();
        $allSetting = SettingWebLara::getAllSettings();
        return view('pages.settingWeb')
            ->with("allSetting", $allSetting)
            ->with('success', 'Data updated to ' . $temp->updated_at . '.');
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
        return view('pages.settingWeb')
            ->with("allSetting", $allSetting)
            ->with('error', 'Cache cleared.');
    }
}
