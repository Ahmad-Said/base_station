<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Antennas;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->except(
                'index',
                'about',
                'references',
                'showFile'
            );
    }

    /**
     * Show references pages
     *
     * @return view - pages.references -> /references
     */
    public function references()
    {
        return view('pages.references');
    }

    /**
     * About page
     *
     * @return view - pages.about -> /about
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show file documentation
     *
     * @param string $file a file name supposed to be as example storage\files\xx.pdf
     *
     * @return response it let the browser deal with the file
     */
    public function showFile($file)
    {
        $filename = 'files\\' . $file;
        $path = storage_path($filename);
        return response()->file($path);
    }

    /**
     * A test function
     *
     * - Database connection types
     * - Another thing
     *
     * @return view - pages.test -> /test
     */
    public function test()
    {

        /////////////////testing differents methods of database on antennas:
        // $test=Antennas::find(62)->portsNb();
        // $test=DB::select('select * from antennas where antennaId = ?', [62]);
        // $test=Antennas::select('Type')->where('antennaId',62)->get();
        // $test=Antennas::select('Type')->where('antennaId',62)->get();
        // $test=Antennas::find(139);
        // return $test->bands;
        ///////////////// ****************

        return View('pages.test');
    }

    // this line to disable something in file
    // phpcs:disable Generic.Files.LineLength.TooLong
    /**
     * ### A template function Title
     *
     * - Showing list
     *  - kids
     *  - kd 2
     * - Another thing
     * ---
     * a line using ---
     * check details [**Here**](https://gist.github.com/PurpleBooth/109311bb0361f32d87a2)
     *
     * @author Ahmad Said
     * @return void
     */
    public function templateComment()
    {
        // just showing how powerful can commenting be with extension
    }
}
