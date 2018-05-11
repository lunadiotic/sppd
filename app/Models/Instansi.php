<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $fillable = [
        'nama', 'alamat', 'telepon', 'email', 'situs', 'logo', 'status'
    ];
}
