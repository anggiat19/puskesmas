<?php

namespace App\Http\Controllers;

use App\Models\Spesialis;
use Illuminate\Http\Request;

class SpesialisController extends Controller
{
    public function index()
    {
        $spesialis = Spesialis::all();
        return view('spesialis.index',['spesialis'=>$spesialis]);

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
        $spesialis =Spesialis::create($request->all());
        return redirect('/spesialis/index')->with('status', 'Spesialis Added Successfully');
    }
}