<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class AuthServices
{
    /**
     * Create new user and assign role.
     */
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

    /**
     * Create token and login user.
     */
    public function login($data)
    {
        $user = User::where('email', $data['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->accessToken;
        return $token;
    }

    /**
     * Reset password for a specific user.
     */
    public function passwordReset($data)
    {
        $user = User::where('email', $data['email'])->first();
        $userID = $user->id;

        if ($userID !== (int)$data['user_id']) {
            return redirect('/login')->with('message', 'Wystąpił błąd. Spróbuj ponownie.');
        }

        $user->password = bcrypt($data['password']);
        $user->save();

        return $user;
    }
}
