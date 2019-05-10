<?php

namespace App\Http\Controllers;

use App\XgBands;
use App\Antennas;
use Illuminate\Http\Request;

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
     * @param Request $request system_number | technology[] | port[] | band[]
     *
     * @return View The result view
     */
    public function showResult(Request $request)
    {
        $anten = Antennas::find(62)->bands;
        $technology = $request->input("technology");
        $port = $request->input("port");
        $band = $request->input("band");
        // return $anten->bands;
        // return $request->input("technology")[0];
        // return $anten;
        // return $request->all();
        // to the view('pages.test')
        return view('welcome')
            ->with("bands", XgBands::getBands())
            ->with("technology", $technology)
            ->with("band", $band)
            ->with("port", $port);
    }
}
