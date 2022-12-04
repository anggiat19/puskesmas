<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $pemeriksaans = Pemeriksaan::all();
        return view('pemeriksaan.index',['pemeriksaans'=>$pemeriksaans]);

     }



     public function store(Request $request)

     {
         // $validated = $request->validate([
         //     'name' => 'required|unique:categories|max:100',

         // ]);
         $pemeriksaans =Pemeriksaan::create($request->all());
         return redirect('/pemeriksaan/index')->with('status', 'Pemeriksaan Added Successfully');
     }
}