<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suhu extends Model
{
    protected $table = 'suhus';

    protected $fillable = ['temp', 'hum', 'created_at'];

}
