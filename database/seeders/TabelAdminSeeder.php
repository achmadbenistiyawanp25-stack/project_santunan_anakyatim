<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TabelAdminSeeder extends Seeder
{
    public function run(): void
    {
        $exists = DB::table('tabel_admin')->where('username', 'adminutama')->exists();

        if (!$exists) {
            DB::table('tabel_admin')->insert([
                'username' => 'adminutama',
                'password' => Hash::make('password123'),
                'status' => 'aktif',
                'terakhir_login' => now(),
            ]);
        }
    }
}
