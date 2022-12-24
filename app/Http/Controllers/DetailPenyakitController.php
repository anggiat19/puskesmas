<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penyakit;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Models\DetailPenyakit;
use App\Models\Pasien;
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

    public function edit(Request $request,$id)
    {

       $detailpenyakits = DetailPenyakit::findorfail($id);
       $pemeriksaans = Pemeriksaan::where('id', '!=',$detailpenyakits->pemeriksaan_id)->select('id','id')->get();
       $penyakits = Penyakit::where('id', '!=',$detailpenyakits->penyakit_id)->select('id','nama_penyakit')->get();
       $obats = Obat::where('id', '!=',$detailpenyakits->obat_id)->select('id','nm_obat')->get();



       return view('detailpenyakit.edit',['detailpenyakits'=>$detailpenyakits,'pemeriksaans'=>$pemeriksaans,'penyakits'=>$penyakits,'obats'=>$obats]);
    }

    public function update(Request $request ,$id){
        $detailpenyakits = DetailPenyakit::findOrfail($id);

        $detailpenyakits->update($request->all());
        return redirect('/detailpenyakit/index');
    }

}
