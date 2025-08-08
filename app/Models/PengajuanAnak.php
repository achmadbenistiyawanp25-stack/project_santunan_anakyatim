<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanAnak extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_anak';
    protected $primaryKey = 'id_pengaju';

    protected $fillable = [
        'id_user',
        'nama_anak',
        'status',
        'tempat_lahir',
        'tanggal_lahir',    
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
        'nama_pendamping',
        'nama_wali',
        'foto_kk',
        'surat_kematian',
        'nama_pengaju',
        'no_pengaju',
    ];
}
