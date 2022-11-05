<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        // $dokters = Dokter::all();
        // return view('dokter.index',['dokters'=>$dokters]);
        // dd($users);

        return view('diagnosa.index');
     }
     public function tambah_data(){
        return view('diagnosa.tambah_data');
     }
}