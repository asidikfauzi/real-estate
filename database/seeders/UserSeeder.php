<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            'id' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Password123!'),
            'name' => 'admin',
            'role' => 'admin',
        ];

        User::insert($user);
    }
}
