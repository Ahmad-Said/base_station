<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

class ProfileController extends Controller
{
    /**
     * Show profile page of authenticated user
     * with input to update fields
     *
     * @return view - pages.profile -> /profile
     */
    public function index()
    {
        $a = Auth::user();
        return view('pages.profile')->with('a', $a);
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
     * @param \Illuminate\Http\Request $request nothing till now
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function show($id)
    {
        if (Auth::user()->type != "admin") {
            return redirect()->back()
                ->with('error', "You have no access to this page");
        }
        $user = User::find($id);
        return view('pages.profile')->with('a', $user);
    }

    /**
     * Switch Active state for specified user
     *
     * @param int $id id
     *
     * @return RedirectResponse
     */
    public function edit($id)
    {
        //
        // return User::whereId($id)->get()[0];
        $user = User::find($id);
        $user->is_activated=!$user->is_activated;
        $user->save();
        if ($user->is_activated) {
            $msg = "Account <i><b>Activated</b></i> Successfully! ";
            $type="success";
        } else {
            $msg = "Account <i><b>Deactivated</b></i> Successfully! ";
            $type="warning";
        }
        $msg.="<a href='/profile/$user->id/edit'>Undo Action</a>
            <br>
            <i class='fas fa-fingerprint'></i> $user->id <br>
            <i class='fas fa-user-tie'></i> $user->name <br>
            <i class='fas fa-paper-plane'></i> $user->email <br>
        ";
        return redirect()->back()
            ->with($type, $msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request id | name | email
     * @param int                      $id      id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        return $request->all();
        $this->validate(
            $request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' =>
                ['required', 'string', 'email', 'max:255', 'unique:usersWeb'],
            ]
        );

        User::whereId($id)->update($request->all('name', 'email'));
        // old way
        // $user = User::find($request->input('id'));
        // $user->name = $request->input("name");
        // $user->email = $request->input("email");
        // $user->save();
        return  redirect()->back()->withInput()
            ->with('success', 'Profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
