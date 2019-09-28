<?php

namespace App\Http\Controllers;

use View;
use App\XgBands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $band->minFreq = $request->input("minFreq");
        $band->maxFreq = $request->input("maxFreq");
        $scrollAfterSubmit = $request->input("scrollAfterSubmit");
        if ($band->minFreq > $band->maxFreq) {
            return redirect(url()->previous() . '#' . $scrollAfterSubmit)
                ->with(
                    'error',
                    'Minimum Frequency cannot be bigger than Maximum Frequency'
                );
        }
        $band->save();
        // https://stackoverflow.com/questions/38847087/laravel-redirect-back-with-location
        return redirect(url()->previous() . '#' . $scrollAfterSubmit)
            ->with('success', 'Band Added');
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
     * @param \Illuminate\Http\Request $request xg | symbol | minFreq |maxFreq
     * @param int                      $id      The id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $minFreq = $request->input("minFreq");
        $maxFreq = $request->input("maxFreq");
        $newSymbol = $request->input("symbol");
        $scrollAfterSubmit = $request->input("scrollAfterSubmit");

        $band = XgBands::find($id);

        $band->minFreq = $minFreq;
        $band->maxFreq = $maxFreq;


        $band->symbol = $newSymbol;

        if ($band->minFreq > $band->maxFreq) {
            return redirect(url()->previous() . '#' . $scrollAfterSubmit)
                ->with(
                    'error',
                    'Minimum Frequency cannot be bigger than Maximum Frequency'
                );
        }

        $band->update();
        return redirect(url()->previous() . '#' . $scrollAfterSubmit)
            ->with('success', 'Band Updated');
        // return redirect('/bands')->with('success', 'Band Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request xg | symbol | band
     * @param int                      $id      The id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $scrollAfterSubmit = $request->input("scrollAfterSubmit");
        $ban = XgBands::find($id);
        $ban->delete();
        return redirect(url()->previous() . '#' . $scrollAfterSubmit)
            ->with('success', 'Band Deleted');
    }
}
