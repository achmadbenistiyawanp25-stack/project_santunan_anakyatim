<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TabelAdmin extends Authenticatable
{
    use HasFactory;

    protected $table = 'tabel_admin';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'username',
        'password',
        'status',
        'terakhir_login',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'terakhir_login' => 'datetime',
    ];
}
