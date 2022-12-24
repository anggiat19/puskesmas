<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    public function index(Request $request)

    {

        $search = $request->search;

        $pasiens = Pasien::where('nama_p','LIKE','%'.$search.'%')
        ->paginate(5);

        return view('pasien.index',['pasiens'=>$pasiens]);

     }






     public function edit(Request $request,$id)
     {

        $pasiens = Pasien::findorfail($id);
        return view('pasien.edit',['pasiens'=>$pasiens]);
     }

     public function update(Request $request ,$id){
        $pasiens = Pasien::findOrfail($id);

        $pasiens->update($request->all());
        return redirect('/pasien/index');
    }





    //  public function index()
    // {
    //     $users = User::with('user')->get();
    //     return view('user.index',['users'=>$users]);
    //     // dd($users);

    //     // return view('user.index');
    //  }

    public function store(Request $request)

    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:categories|max:100',

        // ]);
        // $pasiens =Pasien::create($request->all());


        $pasiens = new Pasien;
        $pasiens->kode_p = $request->kode_p;
        $pasiens->nama_p = $request->nama_p;
        $pasiens->jenis_kel_p = $request->jenis_kel_p;
        $pasiens->tgl_lahir_p = $request->tgl_lahir_p;
        $pasiens->telp_p = $request->telp_p;
        $pasiens->alamat_p = $request->alamat_p;
        $pasiens->nama_kel_p = $request->nama_kel_p;
        $pasiens->user_id = Auth::user()->id;


        $pasiens->save();





        return redirect('/pasien/index')->with('status', 'Pasien Added Successfully Apabila ingin merubah data hubungi admin');
    }


    public function delete($id)
    {
        $pasiens = Pasien::findOrFail($id);
        return view('pasien.delete',['pasiens'=>$pasiens]);
    }

    public function destroy($id)
    {
       $deletepasien = Pasien::findOrFail($id);
       $deletepasien->delete();

        if($deletepasien){
            Session::flash('status',' delete success');
            Session::flash('message','delete pasien succes');
        }
       return redirect('/pasien/index');
    }


}