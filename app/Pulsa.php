<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulsa extends Model
{
    protected $table = 'pulsas';
    protected $fillable = [
        'nama_langgan', 'jml_pulsa', 'harga_paket'
    ];
}
