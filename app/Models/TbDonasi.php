<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDonasi extends Model
{
    protected $table = 'tb_donasi';
    protected $primaryKey = 'id_donasi';

    protected $fillable = [
        'id_user',
        'nama_donasi',
        'tanggal',
        'nominal',
        'metode',
        'jenis_donasi',
        'status',
        'pesan',
    ];
}
