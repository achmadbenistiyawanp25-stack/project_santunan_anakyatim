<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumentasiSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = DB::table('tabel_user')->insertGetId([
            'username' => 'user1',
            'password' => bcrypt('password'),
        ]);

        $user2 = DB::table('tabel_user')->insertGetId([
            'username' => 'user2',
            'password' => bcrypt('password'),
        ]);

        $relawan1 = DB::table('tabel_relawan')->insertGetId([
            'username' => 'relawan1',
            'password' => bcrypt('password'),
        ]);

        $relawan2 = DB::table('tabel_relawan')->insertGetId([
            'username' => 'relawan2',
            'password' => bcrypt('password'),
        ]);

        $admin1 = DB::table('tabel_admin')->insertGetId([
            'username' => 'admin1',
            'password' => bcrypt('password'),
        ]);

        DB::table('dokumentasi')->insert([
            [
                'id_admin' => $admin1,
                'id_relawan' => $relawan1,
                'id_user' => $user1,
                'keterangan' => 'Penyaluran bantuan ke panti asuhan',
                'nominal' => 150000,
                'tanggal' => '2025-07-20',
                'tempat' => 'Panti Asuhan Kasih Ibu',
                'upload_foto' => 'dokumentasi1.jpg',
                'jenis_dokumentasi' => 'dokumentasi umum',
            ],
            [
                'id_admin' => $admin1,
                'id_relawan' => $relawan2,
                'id_user' => $user2,
                'keterangan' => 'Kegiatan sosial dan edukasi anak',
                'nominal' => 250000,
                'tanggal' => '2025-07-21',
                'tempat' => 'Desa Cinta Kasih',
                'upload_foto' => 'dokumentasi2.jpg',
                'jenis_dokumentasi' => 'dokumentasi urgensi',
            ],
        ]);
    }
}
