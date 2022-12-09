<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenyakitController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $penyakits = Penyakit::where('nama_penyakit','LIKE','%'.$search.'%')
        ->paginate(5);
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


     public function delete($id)
     {
         $penyakits = Penyakit::findOrFail($id);
         return view('penyakit.delete',['penyakits'=>$penyakits]);
     }

     public function destroy($id)
     {
        $deletepenyakit = Penyakit::findOrFail($id);
        $deletepenyakit->delete();

         if($deletepenyakit){
             Session::flash('status',' delete success');
             Session::flash('message','delete Penyakit succes');
         }
        return redirect('/penyakit/index');
     }
}