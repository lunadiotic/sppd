<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranDetail extends Model
{
    protected $table = 'pengeluaran_detail';
    protected $fillable = [
        'uraian', 'qty', 'satuan', 'biaya', 'total', 'pengeluaran_id', 'biaya_id'
    ];
}
