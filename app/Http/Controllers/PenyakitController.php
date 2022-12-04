<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('penyakit.index',['penyakits'=>$penyakits]);

     }


     public function store(Request $request)

     {
         // $validated = $request->validate([
         //     'name' => 'required|unique:categories|max:100',

         // ]);
         $penyakits =Penyakit::create($request->all());
         return redirect('/penyakit/index')->with('status', 'penyakit Added Successfully');
     }
}