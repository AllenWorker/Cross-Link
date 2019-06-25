<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Bookmark;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware((['auth', 'role:Admin|UserAdmin']))->except(['profile','index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('profile')->paginate(15);

        $roles = Role::get();
        return view(
            'user.index', compact('users', 'roles')
        );
    }

    public function profile()
    {
        $user = auth()->user();
//        dd( $user->profile->avatar);

        return view('pages.profile', compact('user'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();

        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        if($request->get('password') != "") {
            $this->validate($request, [
                'password' => 'min:6|confirmed'
            ]);
            $user->password = Hash::make($request->get('password'));
        }

        $roles = $request['roles'];
        if (isset($roles)) {

            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {

            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        $user->save();
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        $profile = Profile::FindOrFail($user->id);
        if( $profile->avatar != 'default.png')
        {
            $image = public_path('/upload/avatars/' . $profile->avatar);
            File::delete($image);
        }
        $profile->social_link()->delete();
        $profile->delete();
        $user->delete();
        return redirect('/user');
    }
}
