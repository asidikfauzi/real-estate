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
                'email' => 'rahasia@gmail.com',
                'name' => 'Firdaus Rahasia',
                'no_telp' => '087890987654',
                'keterangan' => 'Agent Rahasia',
                'image' => 'angga.jpg',
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 'ddbe3a6e-edc3-4aa1-aeb5-88281db5c6b5',
                'email' => 'pemabok@gmail.com',
                'name' => 'Angga Pemabok',
                'no_telp' => '081829098391',
                'keterangan' => 'Agent Mabok',
                'image' => 'mabok.jpg',
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => '8138403c-20e2-440c-b101-40afc2547f4b',
                'email' => 'serdadu@gmail.com',
                'name' => 'Revaldhi Sikatan',
                'no_telp' => '087000987890',
                'keterangan' => 'Agent Serdadu',
                'image' => 'serdadu.jpg',
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        Agent::insert($agent);
    }
}
