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
            [
                'id' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Password123!'),
                'name' => 'admin',
                'role' => 'admin',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => '922933f6-802f-44ba-a79a-d48949fe43de',
                'email' => 'angga@gmail.com',
                'password' => Hash::make('Password123!'),
                'name' => 'Firdaus Anggara',
                'role' => 'user',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        User::insert($user);
    }
}
