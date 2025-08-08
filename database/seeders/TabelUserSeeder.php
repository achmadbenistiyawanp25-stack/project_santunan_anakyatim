<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TabelUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tabel_user')->insert([
            'email' => 'user@example.com',
            'username' => 'userbiasa',
            'password' => Hash::make('password123'),
        ]);
    }
}
