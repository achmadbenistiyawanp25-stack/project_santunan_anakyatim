<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAnakSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('data_anak')->insert([
            [
                'id_admin' => 1,
                'id_relawan' => 1,
                'nama_lengkap' => 'Ahmad Zaki',
                'tempat_tanggallahir' => 'Jakarta, 2009-08-12',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jl. Kenanga No.12, Jakarta',
                'asal_sekolah' => 'SDN 01 Jakarta',
                'nama_pendamping' => 'Ibu Siti',
                'nama_wali' => 'Pak Budi',
                'foto_kk' => 'kk_zaki.jpg',
                'surat_kematian' => 'surat_kematian_zaki.pdf',
                'status' => 'anak yatim',
                'nama_pengaju' => 'Ibu Aminah',
                'no_pengaju' => '081234567890',
                'no_rekening' => '1234567890',
            ],
            [
                'id_admin' => 1,
                'id_relawan' => 1,
                'nama_lengkap' => 'Salsabila Nur',
                'tempat_tanggallahir' => 'Bandung, 2010-05-22',
                'jenis_kelamin' => 'perempuan',
                'alamat' => 'Jl. Melati No.45, Bandung',
                'asal_sekolah' => 'SDN 02 Bandung',
                'nama_pendamping' => 'Pak Rudi',
                'nama_wali' => 'Bu Tini',
                'foto_kk' => 'kk_salsa.jpg',
                'surat_kematian' => 'surat_kematian_salsa.pdf',
                'status' => 'anak piatu',
                'nama_pengaju' => 'Pak Ahmad',
                'no_pengaju' => '081298765432',
                'no_rekening' => '9876543210',
            ],
        ]);
    }
}
