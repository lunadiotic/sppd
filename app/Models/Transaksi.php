<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'tanggal', 'last', 'in', 'out', 'saldo', 'sppd_id', 'anggaran_id'
    ];
}
