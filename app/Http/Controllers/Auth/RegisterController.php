<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //         $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'organization' => ['required', 'string'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (Auth::user() && Auth::user()->type == 'admin')
            $data['is_activated'] = 1;
        else
            $data['is_activated'] = 0;

        return User::create(
            [
                'name' => $data['name'],
                'organization' => $data['organization'],
                'type' => $data['type'],
                'is_activated' => $data['is_activated'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
    }


    /*
    *
    * this method is override for normal register way the commented was the original
    * it is used to control access to registration form post
    */

    public function register(Request $request)
    {

        // $this->guard()->login($user);
        // return $this->registered($request, $user)?: redirect($this->redirectPath());
        // return $request->all();
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        if (Auth::user() && Auth::user()->type == 'admin')
            return Redirect::route('home')->with('success', 'Operation Successful !<i class="far fa-smile"></i>');

        return Redirect::back()->with('success', 'Operation Successful !<br>Wait for Site admin to approve it.<br>Have a nice day <i class="far fa-smile"></i>');
    }
}
