<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'panels';
    protected $fillable = ['nm_panel', 'panel'];
}
