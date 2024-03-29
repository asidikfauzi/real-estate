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
                'kamar' => 3,
                'kamar_mandi' => 2,
                'garasi' => 1,
                'alamat' => 'Jl Lippo Jember Di Atas Genteng no 10',
                'kode_pos' => '64911',
                'harga' => '150000000',
                'pondasi' => 'Batu Belah',
                'struktur' => 'Beton Bertulang',
                'atap' => 'Galvalum',
                'dinding' => 'Bata Ringan',
                'platon' => 'Hollow + Gypsum',
                'lantai' => 'Keramik 30x30',
                'kusen' => 'Aluminium',
                'pintu' => 'Engineering Door',
                'sanitasi' => 'Kloset Jongkok',
                'air' => 'Sumur/Bor',
                'listrik' => '900 Watt',
                'keterangan' => 'Di jual tanpa perantara',
                'status' => true,
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 'e67c205c-8011-4ed7-853a-4daaf15f3208',
                'image' => 'rumahdua.jpg',
                'lebar' => '11',
                'panjang' => '15',
                'kamar' => 2,
                'kamar_mandi' => 1,
                'garasi' => 1,
                'alamat' => 'Jl Ozie Jember Di Atas Genteng no 11',
                'kode_pos' => '74012',
                'harga' => '170000000',
                'pondasi' => 'Batu Belah',
                'struktur' => 'Beton Bertulang',
                'atap' => 'Galvalum',
                'dinding' => 'Bata Ringan',
                'platon' => 'Hollow + Gypsum',
                'lantai' => 'Keramik 30x30',
                'kusen' => 'Aluminium',
                'pintu' => 'Engineering Door',
                'sanitasi' => 'Kloset Jongkok',
                'air' => 'Sumur/Bor',
                'listrik' => '900 Watt',
                'keterangan' => 'Di jual tanpa perantara',
                'status' => true,
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => '427cc453-c72f-42dd-8a44-ac89b833a728',
                'image' => 'rumahtiga.jpg',
                'lebar' => '10',
                'panjang' => '20',
                'kamar' => 4,
                'kamar_mandi' => 3,
                'garasi' => 2,
                'alamat' => 'Jl Eterno Jember Di Atas Genteng no 10',
                'kode_pos' => '90219',
                'harga' => '260000000',
                'pondasi' => 'Batu Belah',
                'struktur' => 'Beton Bertulang',
                'atap' => 'Galvalum',
                'dinding' => 'Bata Ringan',
                'platon' => 'Hollow + Gypsum',
                'lantai' => 'Keramik 30x30',
                'kusen' => 'Aluminium',
                'pintu' => 'Engineering Door',
                'sanitasi' => 'Kloset Jongkok',
                'air' => 'Sumur/Bor',
                'listrik' => '900 Watt',
                'keterangan' => 'Di jual tanpa perantara',
                'status' => true,
                'deleted' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ];

        Perumahan::insert($properties);
    }
}
