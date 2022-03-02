<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HalProfilController extends Controller
{
    // Membuka Halaman Profil
    public function halamanProfil()
    {
    	$id = Auth::id();
    	$users = User::find($id);
    	return view('halaman_profil', compact('users'));
    }

    // Mengubah Profil
    public function updateProfil(Request $req)
    {
    	$id = Auth::id();
    	$users = User::find($id);
    	if($req->ubah_foto_input != '' && $req->ubah_nama_input != $users->name){
    		$users->name = $req->ubah_nama_input;
    		$avatar = $req->file('ubah_foto_input');
            $users->avatar = $avatar->getClientOriginalName();
            $avatar->move(public_path('pictures/'), $avatar->getClientOriginalName());
            $users->save();
            echo "sukses";
    	}elseif ($req->ubah_foto_input != '') {
    		$avatar = $req->file('ubah_foto_input');
            $users->avatar = $avatar->getClientOriginalName();
            $avatar->move(public_path('pictures/'), $avatar->getClientOriginalName());	
            $users->save();
            echo "sukses";
    	}elseif ($req->ubah_nama_input != $users->name) {
    		$users->name = $req->ubah_nama_input;
            $users->save();
            echo "sukses";
    	}else{
    		echo "gagal";
    	}
    }

    // Mengubah Password
    public function ubahPassword(Request $request, $id)
    {
        $users = User::find($id);
        if(Hash::check($request->old_password, $users->password)){
            User::where('id', '=', $id)
            ->update(['password' => Hash::make($request->new_password)]);
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}
