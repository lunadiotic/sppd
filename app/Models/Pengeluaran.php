<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $fillable = [
        'nomor', 'sumber_dana', 'nominal', 
        'terbilang', 'keperluan', 'belanja_jenis', 
        'belanja_obyek', 'belanja_rincian', 'tanggal', 'sppd_id'
    ];

    public function detail()
    {
        return $this->hasMany(\App\Models\PengeluaranDetail::class);
    }
}
