<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadArtikel extends Model
{
    protected $table = 'upload_artikel';
    protected $primaryKey = 'id_artikel';
    protected $guarded = [];
}
