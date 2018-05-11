<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPerintah extends Model
{
    protected $table = 'surat_perintah';
    protected $fillable = [
        'nomor', 'uraian', 'tanggal', 'pegawai_id', 'status'
    ];
}
