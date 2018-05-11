<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $fillable = [
        'nomor', 'pemberi', 'nominal', 
        'terbilang', 'keperluan', 'belanja_jenis', 
        'belanja_obyek', 'belanja_rincian', 'sppd_id'
    ];
}
