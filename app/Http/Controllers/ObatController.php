<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $obats = Obat::where('nm_obat','LIKE','%'.$search.'%')
        // ->orWhere('email',$search)
        // ->orWhere('pesan','LIKE','%'.$search.'%')
        ->paginate(5);
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
            'harga'=>$request['harga'],
            'takaran'=>$request['takaran'],
            'stok'=>$request['stok'],
            'status'=>$request['status'],
            'image' => $newName
        ]);
        return redirect('/obat/index')->with('status', 'Obat Added Successfully');
    }


    public function delete($id)
    {
        $obats = Obat::findOrFail($id);
        return view('obat.delete',['obats'=>$obats]);
    }

    public function destroy($id)
    {
       $deleteobat = Obat::findOrFail($id);
       $deleteobat->delete();

        if($deleteobat){
            Session::flash('status',' delete success');
            // Session::flash('message','delete pasien succes');
        }
       return redirect('/obat/index');
    }
}