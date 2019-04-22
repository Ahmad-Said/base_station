<?php

namespace App\Http\Controllers;

use App\XgBands;
use Illuminate\Http\Request;

class AnalyserController extends Controller
{
    //
    public function index()
    {
        $band2=XgBands::where('xg', 2)->get();
        $band3=XgBands::where('xg', 3)->get();
        $band4=XgBands::where('xg', 4)->get();
        $band5=XgBands::where('xg', 5)->get();
        return view('welcome')
                        ->with("band2", $band2)
                        ->with("band3", $band3)
                        ->with("band4", $band4)
                        ->with("band5", $band5);
    }
}
