<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Suhu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HalDashboardController extends Controller
{
    // Membuka Halaman Dashboard
    public function halamanDashboard()
    {
        $suhu_db = Suhu::select('suhus.temp')
    	->orderBy('suhus.temp', 'DESC')
    	->take(6)
    	->get();
        // $suhu_db = Suhu::pluck('temp');
        $suhu_data = Suhu::latest()
    	->take(6)
    	->get()
        ->sortBy('id');
        $suhu_creat = Suhu::select('suhus.created_at')
    	->orderBy('suhus.created_at', 'DESC')
    	->take(6)
    	->get();
        $tampung = DB::table('arduinos')->orderBy('id', 'desc')->first();
        
    	
    	return view('halaman_dashboard', compact('suhu_db', 'suhu_data', 'suhu_creat', 'tampung'));
    }
    public function halamanDashboard1()
    {
       
    	
        $suhu_db = Suhu::select('suhus.temp')
    	->orderBy('suhus.temp', 'DESC')
    	->take(6)
    	->get();
        // $suhu_db = Suhu::pluck('temp');
        $suhu_data = Suhu::latest()
    	->take(6)
    	->get()
        ->sortBy('id');
        $suhu_creat = Suhu::select('suhus.created_at')
    	->orderBy('suhus.created_at', 'DESC')
    	->take(6)
    	->get();
        // $suhu_creat = Suhu::pluck('created_at');
        // $tampung = DB::table('suhus')->orderBy('id', 'desc')->first();
        $tampung = DB::table('arduinos')->orderBy('id', 'desc')->first();
        
    	
    	return view('halaman_dashboard_user1', compact('suhu_db', 'suhu_data', 'suhu_creat', 'tampung'));
    }
    public function halamanDashboard2()
    {
       
    	
        $suhu_db = Suhu::select('suhus.temp')
    	->orderBy('suhus.temp', 'DESC')
    	->take(6)
    	->get();
        // $suhu_db = Suhu::pluck('temp');
        $suhu_data = Suhu::latest()
    	->take(6)
    	->get()
        ->sortBy('id');
        $suhu_creat = Suhu::select('suhus.created_at')
    	->orderBy('suhus.created_at', 'DESC')
    	->take(6)
    	->get();
        // $suhu_creat = Suhu::pluck('created_at');
        // $tampung = DB::table('suhus')->orderBy('id', 'desc')->first();
        $tampung = DB::table('arduinos')->orderBy('id', 'desc')->first();
        
    	
    	return view('halaman_dashboard_1', compact('suhu_db', 'suhu_data', 'suhu_creat', 'tampung'));
    }    

}
