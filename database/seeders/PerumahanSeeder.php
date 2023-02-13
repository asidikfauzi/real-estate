<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perumahan;

class PerumahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $properties = [
            [
                'id' => 'cb1a621f-05a5-49e6-8767-36455fcbeced',
                'image' => 'rumahsatu.jpg',
                'lebar' => '10',
                'panjang' => '10',
                'alamat' => 'Jl Lippo Jember Di Atas Genteng no 10',
                'harga' => '150000000',
                'keterangan' => 'Di jual tanpa perantara',
                'status' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 'e67c205c-8011-4ed7-853a-4daaf15f3208',
                'image' => 'rumahdua.jpg',
                'lebar' => '11',
                'panjang' => '15',
                'alamat' => 'Jl Ozie Jember Di Atas Genteng no 11',
                'harga' => '170000000',
                'keterangan' => 'Di jual tanpa perantara',
                'status' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => '427cc453-c72f-42dd-8a44-ac89b833a728',
                'image' => 'rumahtiga.jpg',
                'lebar' => '10',
                'panjang' => '20',
                'alamat' => 'Jl Eterno Jember Di Atas Genteng no 10',
                'harga' => '260000000',
                'keterangan' => 'Di jual tanpa perantara',
                'status' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        Perumahan::insert($properties);
    }
}
