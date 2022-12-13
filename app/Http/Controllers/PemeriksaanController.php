<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Karyawan;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $pemeriksaans = Pemeriksaan::all();
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $karyawans = Karyawan::all();
        return view('pemeriksaan.index',['pemeriksaans'=>$pemeriksaans,'pasiens'=>$pasiens,'dokters'=>$dokters,'karyawans'=>$karyawans]);

     }



     public function store(Request $request)

     {
         // $validated = $request->validate([
         //     'name' => 'required|unique:categories|max:100',

         // ]);
         $pemeriksaans =Pemeriksaan::create($request->all());
         return redirect('/pemeriksaan/index')->with('status', 'Pemeriksaan Added Successfully');
     }



     public function delete($id)
     {
         $pemeriksaans = Pemeriksaan::findOrFail($id);
         return view('pemeriksaan.delete',['pemeriksaans'=>$pemeriksaans]);
     }

     public function destroy($id)
     {
        $deletepemeriksaan = Pemeriksaan::findOrFail($id);
        $deletepemeriksaan->delete();

         if($deletepemeriksaan){
             Session::flash('status',' delete success');
             Session::flash('message','delete dokter succes');
         }
        return redirect('/pemeriksaan/index');
     }
}