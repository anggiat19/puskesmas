<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReqpasienController extends Controller
{
    public function index()
    {
        // $dokters = Dokter::all();
        // return view('dokter.index',['dokters'=>$dokters]);
        // dd($users);

        return view('reqpasien.index');
     }
     public function tambah_data(){
        return view('reqpasien.tambah_data');
     }
}