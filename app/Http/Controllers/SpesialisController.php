<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpesialisController extends Controller
{
    public function index()
    {
        // $dokters = Dokter::all();
        // return view('dokter.index',['dokters'=>$dokters]);
        // dd($users);

        return view('spesialis.index');
     }
}
