<?php

namespace App\Http\Controllers;

use App\Antennas;
use Illuminate\Http\Request;

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
        $antennasSetIds = explode("_", $request->input("antennasSetIds"));
        $allAntennas = Antennas::all();
        return view('antennas.antennasListPicker')
            ->with("allAntennas", $allAntennas)
            ->with("antennasSetIds", $antennasSetIds)
            ->with("previousUrl", $previousUrl);
    }
}
