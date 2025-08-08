<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanAnakSeeder extends Seeder
{
    public function run(): void
    {
                DB::table('pengajuan_anak')->insert([
            [
                'alamat' => 'Jl. Merdeka No. 10',
                'asal_sekolah' => 'SDN 5 Bandung',
                'foto_kk' => 'kk_faiz.jpg',
                'id_user' => 1,
                'jenis_kelamin' => 'laki-laki',
                'nama_anak' => 'Ahmad Faiz',
                'nama_pendamping' => 'Ust. Anwar',
                'nama_pengaju' => 'Siti Fatimah',
                'nama_wali' => 'Ibu Siti',
                'no_pengaju' => '081234567890',
                'status' => 'anak yatim',
                'surat_kematian' => 'surat_kematian_faiz.jpg',
                'tanggal_lahir' => '2009-03-12',
                'tempat_lahir' => 'Bandung',
            ],
            [
                'alamat' => 'Jl. Kebon Jeruk, Jakarta Barat',
                'asal_sekolah' => 'SDN 12 Jakarta',
                'foto_kk' => 'kk_aisyah.jpg',
                'id_user' => 2,
                'jenis_kelamin' => 'perempuan',
                'nama_anak' => 'Nur Aisyah',
                'nama_pendamping' => 'Bu Nani',
                'nama_pengaju' => 'Hasan Basri',
                'nama_wali' => 'Bpk. Hasan',
                'no_pengaju' => '082112345678',
                'status' => 'anak piatu',
                'surat_kematian' => 'surat_kematian_aisyah.jpg',
                'tanggal_lahir' => '2010-08-25',
                'tempat_lahir' => 'Jakarta',
            ]
        ]);

    }
}
