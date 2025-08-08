<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbDonasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tb_donasi')->insert([
            [
                'id_user' => 1,
                'nama_donasi' => 'Donasi Bulanan',
                'tanggal' => '2025-07-01',
                'nominal' => 250000.00,
                'metode' => 'Y',
                'jenis_donasi' => 'anak yatim',
                'status' => 'berhasil',
                'pesan' => 'Semoga bermanfaat untuk anak-anak yang membutuhkan.'
            ],
            [
                'id_user' => 2,
                'nama_donasi' => 'Donasi Hari Raya',
                'tanggal' => '2025-07-15',
                'nominal' => 500000.00,
                'metode' => 'N',
                'jenis_donasi' => 'anak piatu',
                'status' => 'berhasil',
                'pesan' => 'Donasi untuk hari raya anak-anak piatu.'
            ],
            [
                'id_user' => 3,
                'nama_donasi' => 'Donasi Umum',
                'tanggal' => '2025-07-20',
                'nominal' => 100000.00,
                'metode' => 'Y',
                'jenis_donasi' => 'anak yatim',
                'status' => 'gagal',
                'pesan' => 'Pembayaran gagal, akan coba lagi nanti.'
            ]
        ]);
    }
}
