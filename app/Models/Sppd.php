<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    protected $table = 'sppd';
    protected $fillable = [
    	'nomor','perjalanan',
    	'tempat_berangkat','tempat_tujuan',
    	'tanggal_berangkat','tanggal_kembali',
    	'pengikut',
    	'keterangan',
    	'pegawai_id'
    ];
}
