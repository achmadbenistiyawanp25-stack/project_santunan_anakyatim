<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotoProfilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tabel_user')->update(['foto_profil' => 'default_user.jpg']);
        DB::table('tabel_admin')->update(['foto_profil' => 'default_admin.jpg']);
        DB::table('tabel_relawan')->update(['foto_profil' => 'default_relawan.jpg']);
    }
}
