<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        // $dokters = Dokter::all();
        // return view('dokter.index',['dokters'=>$dokters]);
        // dd($users);

        return view('pasien.index');
     }
     public function tambah_data(){
        return view('pasien.tambah_data');
     }
}