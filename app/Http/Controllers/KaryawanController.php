<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index',['karyawans'=>$karyawans]);

     }

     public function store(Request $request)

     {
         // $validated = $request->validate([
         //     'name' => 'required|unique:categories|max:100',

         // ]);
         $karyawans =Karyawan::create($request->all());
         return redirect('/karyawan/index')->with('status', 'Karyawan Add Successfully');
     }

}