<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('obat.index',['obats'=>$obats]);

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

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
            $request->image->move(public_path('images'), $newName);
        }
        $request['image'] = $newName;
        $obats =Obat::create([
            'kode_obat' => $request['kode_obat'],
            'nm_obat'=>$request['nm_obat'],
            'satuan'=>$request['satuan'],
            'stok'=>$request['stok'],
            'status'=>$request['status'],
            'image' => $newName
        ]);
        return redirect('/obat/index')->with('status', 'Obat Added Successfully');
    }
}