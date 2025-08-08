<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UploadArtikelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('upload_artikel')->insert([
            [
                'id_admin' => 1,
                'foto' => 'artikel1.jpg',
                'text' => 'Artikel pertama mengenai pentingnya pendidikan anak yatim dan kontribusi masyarakat dalam mendukung mereka.',
                'jenis' => 'umum',
                'tanggal' => Carbon::now(),
                'dana_terkumpul' => 100000,
                'target_dana' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'foto' => 'artikel2.jpg',
                'text' => 'Kegiatan sosial yang dilakukan oleh para relawan di wilayah pedesaan untuk memberikan bantuan dan semangat hidup.',
                'jenis' => 'urgensi',
                'tanggal' => Carbon::now()->subDays(2),
                'dana_terkumpul' => 200000,
                'target_dana' => 1000000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
