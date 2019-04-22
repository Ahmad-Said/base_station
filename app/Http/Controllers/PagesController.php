<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\User;
use App\Antennas;
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

    public function references()
    {
        return view('pages.references');
    }
    public function prof(){
        $a=Auth::user();
        return view('pages.profi')->with('a',$a);
    }

    public function otherprof($a){
        if(Auth::user()->type!="admin")
            return redirect()->back()->with('error',"you have not access to this page");
        $user=User::find($a);
        return view('pages.profi')->with('a',$user);
    }

    public function about(){
        return view('pages.abou');
    }

    public function update( Request $request ){
        // return $request->all();
        $user=User::find($request->input('id'));

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

        return View('pages.test');
    }
}
