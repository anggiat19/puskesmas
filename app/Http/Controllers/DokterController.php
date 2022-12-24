<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $dokters = Dokter::where('nama_d','LIKE','%'.$search.'%')
        ->orwhereHas('spesialis',function($query)use($search){
            $query->where('nama_spesialis','LIKE','%'.$search.'%');
        })
        ->paginate(5);
        $spesialis = Spesialis::all();
        return view('dokter.index',['dokters'=>$dokters,'spesialis'=>$spesialis]);
        // dd($users);


     }


     public function store(Request $request)

    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:categories|max:100',

        // ]);

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->nama_d.'-'.now()->timestamp.'.'.$extension;
            $request->image->move(public_path('images'), $newName);
        }
        $request['image'] = $newName;
        $dokters =Dokter::create([
            'kode_d' => $request['kode_d'],
            'nama_d'=>$request['nama_d'],
            'jenis_kel_d'=>$request['jenis_kel_d'],
            'alamat_d'=>$request['alamat_d'],
            'spesialis_id'=>$request['spesialis_id'],
            'image' => $newName
        ]);
        return redirect('/dokter/index')->with('status', 'Dokter Added Successfully');
    }

    public function delete($id)
    {
        $dokters = Dokter::findOrFail($id);
        return view('dokter.delete',['dokters'=>$dokters]);
    }

    public function destroy($id)
    {
       $deletedokter = Dokter::findOrFail($id);
       $deletedokter->delete();

        if($deletedokter){
            Session::flash('status',' delete success');
            Session::flash('message','delete dokter succes');
        }
       return redirect('/dokter/index');
    }

    public function edit(Request $request,$id)
    {

       $dokters = Dokter::findorfail($id);
       $spesialis = Spesialis::where('id', '!=',$dokters->spesialis_id)->select('id','nama_spesialis')->get();



       return view('dokter.edit',['dokters'=>$dokters,'spesialis'=>$spesialis]);
    }



    public function update(Request $request ,$id){

        $dokters = Dokter::find($id);



        $validatedData = $request->validate([
            'kode_d' => '',
            'nama_d' => 'required', //unique:users,username,except,id
            'image' => 'image|mimes:jpeg,png,jpg,png,svg,webp|max:2048',
            'jenis_kel_d' => 'required',
            'alamat_d' =>'required',
            'spesialis_id' =>''


            ]);



            if($request->file('image') != null){
                $imageName = $request->file('image')->getClientOriginalExtension();
                $newName = $request->nama_d.'-'.now()->timestamp.'.'.$imageName;
                $request->file('image')->move(public_path('images'), $newName);
                $validatedData['image'] = $newName;

            }else{
                $validatedData['image'] = $dokters->image;
            }

            Dokter::where('id',$id)->update($validatedData);


        // $dokters->update();
        Session::flash('status','update success');

           return redirect('/dokter/index');
       }






}
