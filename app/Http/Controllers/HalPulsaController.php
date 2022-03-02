<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pulsa;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class HalPulsaController extends Controller
{
    public function halamanPulsa()
    {
    	$hal_pulsa = Pulsa::all();
        return view('halaman_pulsa.halaman_pulsa', compact('hal_pulsa'));
    }

    // Membuka Halaman Tambah pulsa
    public function tambahPulsa()
    {
    	return view('halaman_pulsa.halaman_tambah_pulsa');
    }

    // Menyimpan Outlet Baru
    public function simpanPulsa(Request $req)
    {
    	$outlets = new Pulsa;
    	$outlets->nama_langgan = $req->nama;
    	// $outlets->no_hp_langgan = $req->noHp;
    	$outlets->jml_pulsa = $req->pulsa;
    	// $outlets->harga_paket = $req->harga;
    	
    	$outlets->save();
    	Session::flash('tersimpan', 'Data Pulsa baru berhasil ditambahkan');
		return redirect('/kelola_pulsa');
    }

    // Mengirim data edit Pulsa
    public function editPulsa($id)
    {
    	$outlets = Pulsa::find($id);
    	return view('halaman_pulsa.halaman_edit_pulsa', compact('outlets', 'id'));
    }

    // Mengubah data Outlet
    public function updatePulsa(Request $req, $id)
    {
    	$outlets = Pulsa::find($id);
      $outlets->nama_langgan = $req->nama;
    	// $outlets->no_hp_langgan = $req->noHp;
    	$outlets->jml_pulsa = $req->pulsa;
    	// $outlets->harga_paket = $req->harga;
    	
    	$outlets->save();
    	Session::flash('terubah', 'Data Pulsa berhasil diubah');
		return redirect('/kelola_pulsa');
    }

    // Menghapus Outlet
    public function hapusPulsa($id)
    {
    	$outlets = Pulsa::find($id);
    	$outlets->delete();
    	Session::flash('terhapus', 'Data Pulsa berhasil dihapus');
		return redirect('/kelola_pulsa');
    }

    

}
