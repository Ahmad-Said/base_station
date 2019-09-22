<?php

namespace App\Http\Controllers;

use App\XgBands;
use App\Antennas;
use Illuminate\Http\Request;
use App\AntennasBandsProvider;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AnalyserController;

class AntennasController extends Controller
{
    /**
     * Display a listing of the resource.

     * @return view - pages.antennasList
     */
    public function index()
    {

        $allAntennas = Antennas::all();
        return view('antennas.antennasList')
            ->with("allAntennas", $allAntennas);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id id of resources
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display a listing of the resource. with check box pick.
     *
     * @param Request $request url_full_get: String | antennasSetIds[]
     *
     * @return view - pages.antennasList
     */
    public function pickAntennas(Request $request)
    {
        $previousUrl = $request->input("url_full_get");
        AnalyserController::analyseConfigUrlParser(
            $previousUrl,
            $technology,
            $port,
            $band,
            $bandSymbols,
            $confNb,
            $discard,
            $antenna_per_sector,
            $antenna_preferred,
            $max_height
        );
        $antennasSetIds = explode("_", $request->input("antennasSetIds"));
        $allAntennas = Antennas::all();
        return view('antennas.antennasListPicker')
            ->with("allAntennas", $allAntennas)
            ->with("antennasSetIds", $antennasSetIds)
            ->with("technology", $technology)
            ->with("port", $port)
            ->with("band", $band)
            ->with("bandSymbols", $bandSymbols)
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("antenna_preferred", $antenna_preferred)
            ->with("max_height", $max_height)
            ->with("bandSymbols", $bandSymbols)
            ->with("previousUrl", $previousUrl);
    }
}
