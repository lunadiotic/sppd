<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranDetail extends Model
{
    protected $table = 'pengeluaran_detail';
    protected $fillable = [
        'uraian', 'satuan', 'qty', 'biaya', 'total', 'tanggal', 'pengeluaran_id'
    ];
}
