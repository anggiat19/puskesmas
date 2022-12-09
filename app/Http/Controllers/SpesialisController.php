<?php

namespace App\Http\Controllers;

use App\Models\Spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpesialisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $spesialis = Spesialis::where('nama_spesialis','LIKE','%'.$search.'%')
        ->paginate(5);
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

    public function delete($id)
    {
        $spesialis = Spesialis::findOrFail($id);
        return view('spesialis.delete',['spesialis'=>$spesialis]);
    }

    public function destroy($id)
    {
       $deletespesialis = Spesialis::findOrFail($id);
       $deletespesialis->delete();

        if($deletespesialis){
            Session::flash('status',' delete success');
            // Session::flash('message','delete pasien succes');
        }
       return redirect('/spesialis/index');
    }
}