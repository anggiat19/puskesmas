<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $karyawans = Karyawan::where('nama_kry','LIKE','%'.$search.'%')
        ->paginate(5);
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

     public function delete($id)
     {
         $karyawans = Karyawan::findOrFail($id);
         return view('karyawan.delete',['karyawans'=>$karyawans]);
     }

     public function destroy($id)
     {
        $deletekaryawan = Karyawan::findOrFail($id);
        $deletekaryawan->delete();

         if($deletekaryawan){
             Session::flash('status',' delete success');
             // Session::flash('message','delete pasien succes');
         }
        return redirect('/karyawan/index');
     }

}