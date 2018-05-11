<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'biaya';
    protected $fillable = [
        'parent_id', 'nama', 'status'
    ];
}
