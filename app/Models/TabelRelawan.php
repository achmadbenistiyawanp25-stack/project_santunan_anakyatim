<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabelRelawan extends Model
{
    protected $table = 'tabel_relawan';
    protected $primaryKey = 'id_relawan';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
