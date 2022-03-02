<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Arduino;
use App\Pulsa;
use Illuminate\Support\Facades\DB;



class ArduinoController extends Controller
{
    public function dapat() {
        $relay = Device::all();
                
        $pulsa = Pulsa::get()->sum('jml_pulsa');
        $pulsa_baru = Pulsa::latest()->take(1)->get();
        $pulsa_baru_grup = Pulsa::where('nama_langgan', 'test1')->latest()->first();

        $repo = DB::table('pulsas')
        ->select('nama_langgan', DB::raw('SUM(jml_pulsa) as jml_pulsa'))
        ->groupBy('nama_langgan')->get();
        

        return response()->json(compact('pulsa', 'relay', 'repo', 'pulsa_baru_grup'));
    }

}
