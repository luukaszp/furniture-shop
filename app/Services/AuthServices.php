<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;

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
}
