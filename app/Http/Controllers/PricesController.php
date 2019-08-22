<?php

namespace App\Http\Controllers;

use DB;
use App\prices;
use App\Antennas;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $antennas = prices::
        //     orderBy('antennaId', 'asc')->get();

        $antennas = Antennas::select(
            "antennaId"
        )
            ->get()
            // making it as map key id to antenna
            ->mapWithKeys(
                function ($item) {
                    $antennaPrice = prices::where(
                        [
                            ['antennaId', "=", $item->antennaId]
                        ]
                    )->first();

                    if ( $antennaPrice != null) {
                        return [$item->antennaId => $antennaPrice->price];
                    } else {
                        return [$item->antennaId => 0];
                    }
                }
            );

        return view('prices.index')->with('antennas', $antennas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antennas = prices::select(
            "antennaId"
        )
            ->get()
            // making it as map key id to antenna
            ->mapWithKeys(
                function ($item) {
                    $antennaPrice = prices::where(
                        [
                            ['antennaId', "=", $item->antennaId]
                        ]
                    )->first();

                    if ( $antennaPrice != null) {
                        return [$item->antennaId => $antennaPrice->price];
                    } else {
                        return [$item->antennaId => 0];
                    }
                }
            );
            // return count($request->antennasId);
        for ( $i=0; $i < count($request->antennasId); $i++ ) {

            // test if antennas from table exist in prices table
            // if ( $antennas[$request->antennasId[$i]] != null ) {
                // test if price from request equal to price from prices tables
            if ( !array_key_exists($request->antennasId[$i], $antennas) ) {

                if ( $antennas[$request->antennasId[$i]] == $request->prices[$i] ) {

                } else {
                    // operation when prices not equal
                    // return $request->antennasId[$i];
                    $priceE = prices::where(
                        [
                            ['antennaId', "=", $request->antennasId[$i]]
                        ]
                    )->first();
                    if ($priceE!=null ) {
                        $antennas[$request->antennasId[$i]]=$request->prices[$i];
                        $priceE->price=$request->prices[$i];
                        $priceE->save();
                    } else {
                        return "not exist";

                    }
                }
            } else {
                // if antennas id not exist on prices tables
                $priceE = new prices;
                $priceE->antennasId = $request->antennasId[$i];
                $priceE->price = $request->prices[$i];
                $priceE->save();
                $antennas[$request->antennasId[$i]]=$request->prices[$i];

            }

        }

        return view('prices.index')->with('antennas', $antennas);
    }



    // public function store(Request $request)
    // {
    //     // return count($request->prices);

    //     //

    //     for ( $i=0; $i<count($request->prices); $i++ ) {
    //         $priceE = prices::find($i+1);
    //         // return $priceE;
    //         $priceE->price = $request->prices[$i];
    //         $priceE->save();
    //     }
    //     $antennas = prices::
    //         orderBy('antennaId', 'asc')->get();
    //     return view('prices.index')->with('antennas', $antennas);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
