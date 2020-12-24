<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('id', 'desc')->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        Session::flash('created_user', "User {$user->name} has been created.");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if (!$request->password) {
            $this->validate($request, [
                'name' => 'required',
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($user->id)
                ]
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required',
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($user->id)
                ],
                'password' => 'required|confirmed|min:8',
            ]);

            $user->password = bcrypt($request->password);
        }

        $user->nasme = $request->name;
        $user->email = $request->email;

        $updated = $user->update();

        if ($updated) {
            if (Auth::user()->id === $user->id) {
                Session::flash('updated_user', "Your profile has been updated");
            } else {
                Session::flash('updated_user', "User {$user->name} profile has been updated");
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();

        if ($deleted) {
            Session::flash('deleted_user', "User {$user->name} has been deleted");
        } else {
            Session::flash('deleted_user', "Something went wrong, Please try again.");
        }

        return redirect('/users');
    }
}
