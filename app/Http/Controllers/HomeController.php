<?php

namespace App\Http\Controllers;

use App\User;
use App\AntennasProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return view - home -> /home
     */
    public function index()
    {
        if (auth()->user()->type == "admin") {
            $users = User::orderby('id')
                ->where('id', '!=', Auth::user()->id)->get();

            return view('admin.home')->with('allUsers', $users);
        } else {
            return redirect('/');
        }
    }
}
