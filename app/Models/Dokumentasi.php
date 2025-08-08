<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $primaryKey = 'id_dokumentasi';
    protected $fillable = [
        'id_user',
        'id_admin',
        'id_relawan',
        'jenis_dokumentasi',
        'tanggal',
        'tempat',
        'nominal',
        'upload_foto',
        'keterangan'
    ];
}
