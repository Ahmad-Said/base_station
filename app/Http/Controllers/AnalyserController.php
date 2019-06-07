<?php

namespace App\Http\Controllers;

use App\XgBands;
use App\Antennas;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

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
        $technology = $request->input("technology");
        $port = $request->input("port");
        $band = $request->input("band");
        $antenna_per_sector = $request->input("antenna_per_sector");
        $max_height = $request->input("max_height");
        if (!isset($max_height)) {
            $max_height = PHP_INT_MAX;
        }
        $totalNbPorts = 0;
        foreach ($port as $key => $value) {
            $totalNbPorts += $value;
        }
        // return $max_height;
        $allAntennas = Antennas::where(
            [
                ['Total #RF ports', "<=", $totalNbPorts],
                ['Height (mm)', "<=",  $max_height]
            ]
        )
            ->select(
                "antennaId",
                "Total #RF ports",
                "Height (mm)"
                // later for display
                // ,
                // "Link to product datasheet"
            )
            ->get();
        // return $allAntennas;
        $AntennaSolution = array();

        return view("analyser\\result")
            ->with("AntennaSolution", $AntennaSolution)
            // to make able to return the old view
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("max_height", $max_height)
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port);
    }

    /**
     * Receive form information to analyse them and return result
     *
     * @param Request $request antenna_per_sector | technology[] | port[] | band[]
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
        // This return view with predefined column and stuff
        return view('welcome')
            ->with("bands", XgBands::getBands())
            ->with("antenna_per_sector", $antenna_per_sector)
            ->with("max_height", $request->input("max_height"))
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port);
    }
}
