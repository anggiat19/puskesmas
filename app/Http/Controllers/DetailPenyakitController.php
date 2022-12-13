<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penyakit;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Models\DetailPenyakit;
use Illuminate\Support\Facades\Session;

class DetailPenyakitController extends Controller
{
    public function index()
    {
        // $detailpenyakits = DetailPenyakit::all();
        // return view('detailpebyakit.index',['dokters'=>$dokters]);
        // // dd($users);
        $detailpenyakits = DetailPenyakit::all();
        $pemeriksaans = Pemeriksaan::all();
        $penyakits = Penyakit::all();
        $obats = Obat::all();
        return view('detailpenyakit.index',['detailpenyakits'=>$detailpenyakits,'pemeriksaans'=>$pemeriksaans,'penyakits'=>$penyakits,'obats'=>$obats]);



     }

     public function store(Request $request)

     {
         // $validated = $request->validate([
         //     'name' => 'required|unique:categories|max:100',

         // ]);
         $detailpenyakits =DetailPenyakit::create($request->all());
         return redirect('/detailpenyakit/index')->with('status', 'DetailPenyakit Added Successfully');
     }


     public function delete($id)
    {
        $detailpenyakits = DetailPenyakit::findOrFail($id);
        return view('detailpenyakit.delete',['detailpenyakits'=>$detailpenyakits]);
    }

    public function destroy($id)
    {
       $deletedetailpenyakits = DetailPenyakit::findOrFail($id);
       $deletedetailpenyakits->delete();

        if($deletedetailpenyakits){
            Session::flash('status',' delete success');
            Session::flash('message','delete dokter succes');
        }
       return redirect('/detailpenyakit/index');
    }
}
