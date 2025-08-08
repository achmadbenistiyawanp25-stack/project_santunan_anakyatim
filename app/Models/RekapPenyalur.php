<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekapPenyalur extends Model
{
    use HasFactory;

    protected $table = 'rekap_penyalur';
    protected $primaryKey = 'id_penyalur';

    protected $fillable = [
        'id_admin',
        'id_relawan',
        'id_user',
        'tanggal',
        'nama_anak',
        'donasi_masuk',
        'donasi_keluar',
        'nominal', 
        'nama_penyalur',
        'no_rekening',
        'bukti_tasaruf',
        'status',
    ];


    public function admin()
    {
        return $this->belongsTo(TabelAdmin::class, 'id_admin', 'id_admin');
    }

    public function relawan()
    {
        return $this->belongsTo(TabelRelawan::class, 'id_relawan', 'id_relawan');
    }

    public function user()
    {
        return $this->belongsTo(TabelUser::class, 'id_user', 'id_user');
    }
}
