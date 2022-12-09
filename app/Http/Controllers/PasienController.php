<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)

    {
        $search = $request->search;
        $pasiens = Pasien::where('nama_p','LIKE','%'.$search.'%')
        ->paginate(5);

        return view('pasien.index',['pasiens'=>$pasiens]);

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
        $pasiens =Pasien::create($request->all());
        return redirect('/pasien/index')->with('status', 'Pasien Added Successfully');
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
