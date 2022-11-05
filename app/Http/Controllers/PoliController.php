<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        // $dokters = Dokter::all();
        // return view('dokter.index',['dokters'=>$dokters]);
        // dd($users);

        return view('poli.index');
     }
     public function tambah_data(){
        return view('poli.tambah_data');
     }
}
