<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AuthServices
{
    public function register($data)
    {
        $user = User::create([
            'name' => $data->name,
            'surname' => $data->surname,
            'email' => $data->email,
            'address' => $data->address,
            'zip_code' => $data->zip_code,
            'city' => $data->city,
            'province' => $data->province,
            'phone_number' => $data->phone_number,
            'password' => bcrypt($data->password)
        ]);

        $role = new Role();
        $role->user_id = $user->id;
        $role->save();

        return $user;
    }

    public function login($data)
    {
        if (!Auth::attempt($data->only('email', 'password'))) {
            return redirect('/login')->with('message', 'Zły e-mail lub hasło.');
        }

        $user = User::where('email', $data['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        return $token;
    }
}
