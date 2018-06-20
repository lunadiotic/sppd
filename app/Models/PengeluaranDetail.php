<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranDetail extends Model
{
    protected $table = 'pengeluaran_detail';
    protected $fillable = [
        'uraian', 'qty', 'satuan', 'harga', 'total', 'pengeluaran_id', 'biaya_id'
    ];

    public function pengeluaran()
    {
        return $this->belongsTo(\App\Models\Pengeluaran::class);
    }

    public function biaya()
    {
        return $this->belongsTo(\App\Models\Biaya::class);
    }
}
