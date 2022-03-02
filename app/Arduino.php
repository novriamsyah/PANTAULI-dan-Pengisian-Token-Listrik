<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    protected $table = 'arduinos';

    protected $fillable = ['tegangan', 'arus', 'pf', 'pf_sudah', 'dy_aktif', 'dy_reaktif', 'dy_semu', 'energi'];
}
