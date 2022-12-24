<?php

namespace App\Http\Controllers;
use App\Models\Obat;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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




        // $newName = '';
        // if($request->file('image')){
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $newName = $request->nm_obat.'_'.now()->timestamp.'.'.$extension;
        //     $request->file('image')->storeAs('image',$newName);
        // }


        // $validated = $request->validate([
        //     'name' => 'required|unique:categories|max:100',

        // ]);



        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->nm_obat.'-'.now()->timestamp.'.'.$extension;
            $request->image->move(public_path('images'), $newName);
        }

        //     $request['image']= $newName;
        // $obats = Obat::create($request->all());
        // }
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

        // $input = $request->all();

        // if($image = $request->file('image')){
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
        //     $image->move($destinationPath,$profileImage);
        //     $input['image'] = "$profileImage";
        // }

        // $request->validate(
        //     [
        //         'image' => 'required|image|mimes:png,jpg|max:'
        //     ]
        //     );

        // $image = $request->image;
        // $slug = Str::slug($image->getClientOriginalName());
        // $new_gambar = time().'_'.$slug;
        // $extension = $request->file('image')->getClientOriginalExtension();
        // $newName = $request->nm_obat.'-'.now()->timestamp.'.'.$extension;
        // $request->image->move(public_path('images'), $newName);
        // $request['image'] = $newName;

        // $obats = new Obat;
        // $obats->kode_obat = $request->kode_obat;
        // $obats->nm_obat = $request->nm_obat;
        // $obats->satuan = $request->satuan;
        // $obats->harga = $request->harga;
        // $obats->takaran = $request->takaran;
        // $obats->stok = $request->stok;
        // $obats->status = $request->status;
        // $obats->image = 'image'.$newName;



        // $obats->save();


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


    public function edit(Request $request,$id)
    {

       $obats = Obat::findorfail($id);
       return view('obat.edit',['obats'=>$obats]);
    }




    public function update(Request $request ,$id){

    $obats = Obat::find($id);

    $validatedData = $request->validate([
        'kode_obat' => '',
        'nm_obat' => 'required', //unique:users,username,except,id
        'image' => 'image|mimes:jpeg,png,jpg,png,svg|max:2048',
        'satuan' => 'required',
        'harga' =>'required',
        'takaran' =>'required',
        'stok' => 'required',
        'status' => 'required'
        ]);



        if($request->file('image') != null){
            $imageName = $request->file('image')->getClientOriginalExtension();
            $newName = $request->nm_obat.'-'.now()->timestamp.'.'.$imageName;
            $request->file('image')->move(public_path('images'), $newName);
            $validatedData['image'] = $newName;

        }else{
            $validatedData['image'] = $obats->image;
        }
        Obat::where('id',$id)->update($validatedData);


    
    Session::flash('status','update success');

       return redirect('/obat/index');
   }
}
