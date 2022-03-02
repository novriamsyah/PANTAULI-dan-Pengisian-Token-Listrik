<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suhu;
use App\Arduino;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class ChartController extends Controller
{
    //chart API daya aktif
    public function send_dy() {
        
        $datas = Arduino::latest()->take(8)->get()->sortBy('id');
        $dy = $datas->pluck('dy_aktif');
        $wkt = $datas->pluck('created_at');
        $waktu = $wkt->map(function($item){
            return $item->format('H:i:s');
        });
                return response()->json(compact('dy', 'waktu'));

    }

    //chart API Power Factor
    public function send() {

        $datas = Arduino::latest()->take(8)->get()->sortBy('id');
        $pf = $datas->pluck('pf');
        $pf_sudah = $datas->pluck('pf_sudah');
        $wkt = $datas->pluck('created_at');
        $waktu = $wkt->map(function($item){
            return $item->format('H:i:s');
        });
        
        return response()->json(compact('pf', 'pf_sudah', 'waktu'));

    }

    //Chart Pie API Daya
    public function kirim() {
        $datas = Suhu::latest()->take(7)->get()->sortBy('id');
        $hum = $datas->pluck('hum');
        $suhu = $datas->pluck('temp');
        $wkt = $datas->pluck('created_at');
        $waktu = $wkt->map(function($item){
            return $item->format('H:i:s');
        });
        
        $pie = Arduino::latest()->take(1)->get();
        $aktif = $pie->pluck('dy_aktif');
        $reaktif = $pie->pluck('dy_reaktif');
        $semu = $pie->pluck('dy_semu');
        return response()->json(compact('hum', 'suhu', 'waktu', 'datas', 'aktif', 'reaktif', 'semu'));
    }

    //API auto update ajax tabel
    public function tabel() {
        
        $datas = Arduino::latest()->take(8)->get();
        $wkt = $datas->pluck('created_at');
        $waktu = $wkt->map(function($item){
            
            return $item->diffForHumans();
        });
        
        return json_encode(array('data'=>$datas, 'waktu'=>$waktu));
        
    }

    //API auto update ajax tabel
    public function tabel2() {
        
        $datas = Arduino::latest()->take(7)->get();
        $wkt = $datas->pluck('created_at');
        $waktu = $wkt->map(function($item){
            
            return $item->diffForHumans();
        });

        return json_encode(array('data'=>$datas, 'waktu'=>$waktu));
        

    }

    //API auto update ajax tabel
    public function tabel3() {
        
        $datas = Arduino::latest()->take(7)->get();
        
        $wkt = $datas->pluck('created_at');
        $waktu = $wkt->map(function($item){
            
            return $item->diffForHumans();
        });
        
        return json_encode(array('data'=>$datas, 'waktu'=>$waktu));

        

    }

}
