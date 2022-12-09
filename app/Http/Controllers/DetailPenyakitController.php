<?php

namespace App\Http\Controllers;

use App\Models\DetailPenyakit;
use Illuminate\Http\Request;

class DetailPenyakitController extends Controller
{
    public function index()
    {
        // $detailpenyakits = DetailPenyakit::all();
        // return view('detailpebyakit.index',['dokters'=>$dokters]);
        // // dd($users);
        $detailpenyakits = DetailPenyakit::all();
        return view('detailpenyakit.index',['detailpenyakits'=>$detailpenyakits]);



     }
}