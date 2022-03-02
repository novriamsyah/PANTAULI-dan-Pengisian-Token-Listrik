<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suhu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Events\CobaEvent;


class SensorController extends Controller
{
    public function masuk ($temperature, $humidity)
    {
        $data = DB::table('suhus');
        $tgl = Carbon::now();
        $tgl1 = Carbon::now();

        $data->insert([
            'temp' => $temperature,
            'hum' => $humidity,
            'created_at' => $tgl,
            'updated_at' => $tgl
        ]);

        // return event(new CobaEvent($temperature, $humidity));
    }

    public function dataArduino ($tegangan, $arus, $pf, $pf_sudah, $dy_aktif, $dy_reaktif, $dy_semu, $sisa_pulsa, $energi)
    {
        $data = DB::table('arduinos');
        $tgl = Carbon::now();
        $tgl1 = Carbon::now();

        $data->insert([
            'tegangan' => $tegangan,
            'arus' => $arus,
            'pf' => $pf,
            'pf_sudah' => $pf_sudah,
            'dy_aktif' => $dy_aktif,
            'dy_reaktif' => $dy_reaktif,
            'dy_semu' => $dy_semu,
            'energi' => $energi,
            'created_at' => $tgl,
            'updated_at' => $tgl
        ]);

        return event(new CobaEvent($tegangan, $arus, $pf, $pf_sudah, $dy_aktif, $dy_reaktif, $dy_semu, $sisa_pulsa, $energi));
    }
}
