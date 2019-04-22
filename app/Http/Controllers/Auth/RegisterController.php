<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

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
    public function __construct()
    {
        // old
        // $this->middleware('guest');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'regex:/(.*)@rfsworld\.com/i', 'max:255', 'unique:usersWeb'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    /*
    *
    *this method is override for normal register way the commented was the original
    * it is used to control access to registration form post
    */

    public function register(Request $request)
    {

        //$this->guard()->login($user);

        // return $this->registered($request, $user)?: redirect($this->redirectPath());
        // return $request->all();
        if (auth::user()->type !='admin') {
            return redirect('/home')->with('error', 'You cannot register Other Users!<br>Ask admin for access code.. redirect later with input box..');
        }
        $this->validator($request->all())->validate();


        // event(new Registered($user = $this->create($request->all())));

        $user= new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->type=$request->input('type');
        $user->save();
        return Redirect::back()->with('success', 'Operation Successful !<br> User id: '.$user->id.'<br>Username: '.$user->name.'<br>Email: '.$user->email.'<br>Type: '.$user->type);
    }

    // we can make href for button submitted from the form
    public function register_with_code($code)
    {
        // create database code generated table and check if exist...
        // if not redirect back with error not found

        // if yes

        //$this->guard()->login($user);

       // return $this->registered($request, $user)?: redirect($this->redirectPath());
    }


    /*
    *
    *this method is override for normal get to register way the commented was the original
    */

    public function showRegistrationForm()
    {
        //  // if registration is closed, deny access
        //  if (!config('backpack.base.registration_open')) {
        //      abort(403, trans('backpack::base.registration_closed'));
        //  }
        //  $this->data['title'] = trans('backpack::base.register'); // set the page title
        // //  return view('backpack::auth.register', $this->data);
        //  return view('backpack::auth.register', $this->data);

        return view('auth.register');
    }
}
