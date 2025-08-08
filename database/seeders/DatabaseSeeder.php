<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil semua seeder custom
        $this->call([
            TabelAdminSeeder::class,
            TabelUserSeeder::class,
            TabelRelawanSeeder::class,
            DataAnakSeeder::class,
            DokumentasiSeeder::class,
            UploadArtikelSeeder::class,
            KomentarArtikelSeeder::class,
            LaporanDonasiSeeder::class,
            PengajuanAnakSeeder::class,
            TbDonasiSeeder::class,
            RekapPenyalurSeeder::class,
            FotoProfilSeeder::class,
            NotifikasiSeeder::class,
        ]);

        // Buat satu user dari factory (opsional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
