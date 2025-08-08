<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanDonasi extends Model
{
    protected $table = 'laporan_donasi';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_admin',
        'id_relawan',
        'total_donasi',
        'jumlah_anak',
        'jumlah_penyalur'
    ];
}
