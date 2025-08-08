<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarArtikel extends Model
{
    protected $table = 'komentar_artikel';
    protected $primaryKey = 'id_komentar';

    protected $fillable = [
        'id_artikel',
        'id_user',
        'tanggal',
        'text'
    ];
}
