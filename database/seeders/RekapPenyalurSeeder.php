<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekapPenyalurSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID referensi yang sudah ada
        $id_admin = DB::table('tabel_admin')->value('id_admin');
        $id_relawan = DB::table('tabel_relawan')->value('id_relawan');
        $id_user = DB::table('tabel_user')->value('id_user');

        // Pastikan semua ID referensi tersedia
        if (!$id_admin || !$id_relawan || !$id_user) {
            $this->command->error('Data referensi (admin, relawan, user) belum tersedia. Seeder tidak dijalankan.');
            return;
        }

        DB::table('rekap_penyalur')->insert([
            [
                'id_admin' => $id_admin,
                'id_relawan' => $id_relawan,
                'id_user' => $id_user,
                'tanggal' => now()->toDateString(),
                'nama_anak' => 'Ahmad Naufal',
                'nominal' => 150000.000000, // ✅ Ditambahkan
                'donasi_masuk' => 150000.000000,
                'donasi_keluar' => 150000.000000,
                'nama_penyalur' => 'Ust. Ridwan',
                'no_rekening' => '1234567890',
                'bukti_tasaruf' => 'bukti_tasaruf_1.jpg',
                'status' => 'berhasil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => $id_admin,
                'id_relawan' => $id_relawan,
                'id_user' => $id_user,
                'tanggal' => now()->subDays(1)->toDateString(),
                'nama_anak' => 'Siti Maemunah',
                'nominal' => 200000.000000, // ✅ Ditambahkan
                'donasi_masuk' => 200000.000000,
                'donasi_keluar' => 200000.000000,
                'nama_penyalur' => 'Bpk. Hendra',
                'no_rekening' => '0987654321',
                'bukti_tasaruf' => 'bukti_tasaruf_2.jpg',
                'status' => 'berhasil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
