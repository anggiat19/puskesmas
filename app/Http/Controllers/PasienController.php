<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('pasien')->get();
        return view('pasien.index',['pasiens'=>$pasiens]);


        return view('pasien.index');
     }
     public function tambah_data(){
        return view('pasien.tambah_data');
     }


    //  public function index()
    // {
    //     $users = User::with('user')->get();
    //     return view('user.index',['users'=>$users]);
    //     // dd($users);

    //     // return view('user.index');
    //  }
}
