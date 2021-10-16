<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display user info by id
     */
    public function userInfo()
    {
        $users = User::where('id', auth()->user()->id)->get();

        return view('/profile/contact_details', compact('users'));
    }

    /**
     * Edit specific user.
     */
    public function editUser(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->phone_number = $request->phone_number;

        $user->save();

        $users = User::where('id', auth()->user()->id)->get();

        return view('/profile/contact_details', compact('users'));
    }

    /**
     * Display all users
     */
    public function showAll()
    {
        $users = User::paginate(10);
        return view('admin_panel.customers', compact('users'));
    }
}
