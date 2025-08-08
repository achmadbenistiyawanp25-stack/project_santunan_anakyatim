<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomentarArtikelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('komentar_artikel')->insert([
            [
                'id_artikel' => 1,
                'id_user' => 1,
                'tanggal' => now(),
                'text' => 'Sangat menginspirasi! Semoga kegiatan ini terus berlanjut.'
            ],
            [
                'id_artikel' => 1,
                'id_user' => 2,
                'tanggal' => now(),
                'text' => 'Terima kasih sudah peduli pada anak-anak yang membutuhkan.'
            ],
            [
                'id_artikel' => 2,
                'id_user' => 1,
                'tanggal' => now(),
                'text' => 'Salut untuk para relawan. Semangat terus!'
            ]
        ]);
    }
}
