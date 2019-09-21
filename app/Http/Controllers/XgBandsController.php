<?php

namespace App\Http\Controllers;

use View;
use App\XgBands;
use Illuminate\Http\Request;

class XgBandsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bands = XgBands::getBands();
        return view('xgBands.index')->with("bands", $bands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request xg | symbol | band
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $band = new XgBands();
        $band->xg = $request->input("xg");
        $band->symbol = $request->input("symbol");
        $band->bands = $request->input("band");

        $band->save();
        return redirect('/bands')->with('success', 'Band Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id The id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id The id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request xg | symbol | band
     * @param int                      $id      The id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $newBand = $request->input("band");
        $newSymbol = $request->input("symbol");

        $band = XgBands::find($id);
        $oldBand = $band->bands;

        $band->bands = $newBand;

        $newSymbol = preg_replace("#$oldBand#", "$newBand", $newSymbol);

        $band->symbol = $newSymbol;
        $band->update();
        return redirect('/bands')->with('success', 'Band Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id The id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ban = XgBands::find($id);
        $ban->delete();
        return redirect('/bands')->with('success', 'Band Deleted');
    }
}
