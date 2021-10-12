<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'John',
            'surname' => 'Smith',
            'email' => 'sklep-meblowy@gmail.com',
            'address' => 'ul. Admiralska 1',
            'zip_code' => '51-218',
            'city' => 'Wrocław',
            'province' => 'dolnośląskie',
            'phone_number' => '667 744 888',
            'password' => bcrypt('ZAQ!2wsxzaq1@WSX')
        ]);

        $role = new Role();
        $role->user_id = $user->id;
        $role->is_admin = 1;
        $role->save();
    }
}
