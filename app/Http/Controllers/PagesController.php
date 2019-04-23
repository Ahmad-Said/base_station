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
     * @return view - pages.references -> /profile
     */
    public function references()
    {
        return view('pages.references');
    }

    /**
     * Show profile page of authenticated user
     * with input to update fields
     *
     * @return view - pages.profile -> /profile
     */
    public function profile()
    {
        $a = Auth::user();
        return view('pages.profile')->with('a', $a);
    }

    /**
     * Show profile of authenticated user
     *
     * Pages have input to update attributes
     *
     * @param int $id - id of user to show
     *
     * @return view - pages.profile -> /profile/{a}
     */
    public function otherProfile($id)
    {
        if (Auth::user()->type != "admin") {
            return redirect()->back()
                ->with('error', "you have not access to this page");
        }
        $user = User::find($id);
        return view('pages.profile')->with('a', $user);
    }

    /**
     * About page
     *
     * @return view pages
     */
    public function about()
    {
        return view('pages.abou');
    }

    /**
     * Update profile upon Post request
     *
     * @param Request $request id | name | email
     *
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        // return $request->all();
        $user = User::find($request->input('id'));

        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->save();
        return  redirect()->back()->withInput()
            ->with('success', 'Profile Updated Successfully!');
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
