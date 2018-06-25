<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $fillable = [
        'nomor', 'sumber_dana', 'nominal', 
        'terbilang', 'keperluan', 'belanja_jenis', 
        'belanja_obyek', 'belanja_rincian', 'tanggal', 'keterangan', 'sppd_id', 'status'
    ];

    public function detail()
    {
        return $this->hasMany(\App\Models\PengeluaranDetail::class);
    }

    public function sppd()
    {
        return $this->belongsTo(\App\Models\Sppd::class);
    }

     // this is a recommended way to declare event handlers
     protected static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->detail()->delete();
             // do the rest of the cleanup...
        });
    }
}
