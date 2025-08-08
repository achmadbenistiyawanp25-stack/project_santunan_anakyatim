<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TabelRelawanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tabel_relawan')->insert([
            'username' => 'relawan1',
            'password' => Hash::make('relawan123'), // gunakan hash agar aman
        ]);
    }
}
