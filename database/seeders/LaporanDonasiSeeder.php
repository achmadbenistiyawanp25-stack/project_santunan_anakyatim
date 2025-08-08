<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanDonasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('laporan_donasi')->insert([
            [
                'id_admin' => 1,
                'id_relawan' => 1,
                'total_donasi' => 5000000.00,
                'jumlah_anak' => 25,
                'jumlah_penyalur' => 5
            ],
            [
                'id_admin' => 1,
                'id_relawan' => 2,
                'total_donasi' => 7500000.00,
                'jumlah_anak' => 30,
                'jumlah_penyalur' => 8
            ],
            [
                'id_admin' => 2,
                'id_relawan' => 1,
                'total_donasi' => 3000000.00,
                'jumlah_anak' => 15,
                'jumlah_penyalur' => 4
            ]
        ]);
    }
}
