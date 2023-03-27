<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $agent = [
            [
                'id' => 'b3e5a035-f7f5-4b97-88be-28edd9b13680',
                'email' => 'ismail88@gmail.com',
                'name' => 'Ismail',
                'no_telp' => '087890987654',
                'keterangan' => '',
                'image' => 'ismail.jpg',
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 'ddbe3a6e-edc3-4aa1-aeb5-88281db5c6b5',
                'email' => 'maria2001@gmail.com',
                'name' => 'Maria Natalia S',
                'no_telp' => '081829098391',
                'keterangan' => '',
                'image' => 'maria.jpg',
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => '8138403c-20e2-440c-b101-40afc2547f4b',
                'email' => 'junaidi.opek@gmail.com',
                'name' => 'Akh Junaidi',
                'no_telp' => '087000987890',
                'keterangan' => '',
                'image' => 'junaidi.jpg',
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        Agent::insert($agent);
    }
}
