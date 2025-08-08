<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notifikasi;

class NotifikasiSeeder extends Seeder {
    public function run(): void {
        Notifikasi::create([
            'id_user' => 1,
            'judul' => 'Pendaftaran Diterima',
            'isi' => 'Selamat! Pendaftaran kamu telah disetujui.',
            'status' => 'belum terbaca',
            'waktu' => now(),
        ]);
    }
}
