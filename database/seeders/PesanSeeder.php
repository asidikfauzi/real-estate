<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesan;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pesans = [
            [
                'user_from' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711', //angga
                'user_to' => '922933f6-802f-44ba-a79a-d48949fe43de', //admin
                'header' => 'TANYA',
                'keterangan' => 'Mas perumahan di lippo 097 saya ingin pesan',
                'image' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'user_from' => '922933f6-802f-44ba-a79a-d48949fe43de',
                'user_to' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711',
                'header' => 'JAWAB',
                'keterangan' => 'Baik mas silahkan DP terlebih dahulu di rekening
                        \n 08899087871 BCA \n atas nama KOLONEL MUKIDI
                        \n dan kirimkan syarat kemampuan ninja warior',
                'image' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'user_from' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711', //angga
                'user_to' => '922933f6-802f-44ba-a79a-d48949fe43de', //admin
                'header' => 'TANYA',
                'keterangan' => 'Baik mas saya akan kirimkan',
                'image' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        Pesan::insert($pesans);
    }
}
