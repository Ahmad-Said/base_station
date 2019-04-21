<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Antennas;
use App\XgBands;
class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','about','references','showfile');
    }
    public function index(){
        return view('welcome');
    }

    public function references()
    {
        return view('pages.references');
    }
    public function prof(){
        return view('pages.profi');
    }
    
    public function about(){
        return view('pages.abou');
    }
    
    public function update( Request $request ){
        // return $request->all();
        $user=auth()->User();
        $user->name=$request->input("name");
        $user->email=$request->input("email");
        $user->save();
        return  redirect()->back()->withInput()->with('success', 'Profile Updated Successfully!');
        
    }
    
    public function showfile($file){
        $filename = 'files\\'.$file;
        $path = storage_path($filename);
        return response()->file($path);
    }
    
    public function test(){
    
        /////////////////testing differents methods of database on antennas: ****************
        // $test=Antennas::find(62)->portsNb();
        // $test=DB::select('select * from antennas where antennaId = ?', [62]);
        // $test=Antennas::select('Type')->where('antennaId',62)->get();
        // $test=Antennas::select('Type')->where('antennaId',62)->get();
        // $test=Antennas::find(139);
        // return $test->bands;
        ///////////////// ****************
        
        $band2=XgBands::where('xg',2)->get();
        $band3=XgBands::where('xg',3)->get();
        $band4=XgBands::where('xg',4)->get();
        $band5=XgBands::where('xg',5)->get();
        return view('pages.test')
                        ->with("band2",$band2)
                        ->with("band3",$band3)
                        ->with("band4",$band4)
                        ->with("band5",$band5);
    }
}
