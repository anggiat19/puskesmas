<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index(Request $request)


    {
        $search = $request->search;
        $users = User::where('username','LIKE','%'.$search.'%')
        ->orwhereHas('user',function($query)use($search){
            $query->where('name','LIKE','%'.$search.'%');
        })
        ->paginate(5);
        $roles = Role::all();
        return view('user.index',['users'=>$users,'roles'=>$roles]);
        // dd($users);

        // return view('user.index');
     }
    public function login()
    {

            return view('login');
    }


    public function register()
    {
        return view('register');
    }

    public function authenticationg(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        //cek apakah login valid

        if (Auth::attempt($credentials)) {
             //cek apakah user status = active
             if(Auth::user()->status !='active'){

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. please contact admin');
                return redirect('login');
             }
            //  $request->session()->regenerate();
             if(Auth::user()->role_id == 1){
                return redirect('dashboard');
             }
             if(Auth::user()->role_id == 2){
                return redirect('client');
             }

             return redirect();
        }
            Session::flash('status', 'failed');
            Session::flash('message', 'Login Invalid');
            return redirect('login');

        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }

        public function registerprocess(Request $request)
        {



            // dd($request->all());
            $validated = $request->validate([
                'username' => 'required|unique:users|max:255',
                'password' => 'required|max:255',
                'email' => 'required',
                'phone' => 'max:255',
                'image'=> 'max:2048',
                 'status'=>'',
                'role_id'=>'',


            ]);
            $newName = '';
            if($request->file('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
                $request->image->move(public_path('images'), $newName);
            }
            $request['image'] = $newName;

            $request['password'] = Hash::make($request->password);
            $user = User::create([
                'username' => $request['username'],
                'password'=>$request['password'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],

                'status'=>$request['status'],
                'role_id'=>$request['role_id'],

                'image' => $newName
            ]);


            Session::flash('status', 'success');
            Session::flash('message', 'Regist success');
            return redirect('/user/index');

        }
        public function registerprocess1(Request $request)
        {



            // dd($request->all());
            $validated = $request->validate([
                'username' => 'required|unique:users|max:255',
                'password' => 'required|max:255',
                'email' => 'required',
                'phone' => 'max:255',



            ]);
           

            $request['password'] = Hash::make($request->password);
            $user = User::create([
                'username' => $request['username'],
                'password'=>$request['password'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],


            ]);


            Session::flash('status', 'success');
            Session::flash('message', 'Regist success');
            return redirect('/user/index');

        }


        public function delete($id)
        {
            $users = User::findOrFail($id);
            return view('user.delete',['users'=>$users]);
        }

        public function destroy($id)
        {
           $deleteuser = User::findOrFail($id);
           $deleteuser->delete();

            if($deleteuser){
                Session::flash('status',' delete success');
                Session::flash('message','delete user succes');
            }
           return redirect('/user/index');
        }




        public function edit(Request $request,$id)
        {

           $users = User::findorfail($id);
            $roles = Role::where('id', '!=',$users->role_id)->select('id','name')->get();
           return view('user.edit',['users'=>$users,'roles'=>$roles]);
        }


        public function update(Request $request ,$id){

            $users = User::findOrfail($id);

            $request['password'] = Hash::make($request->password);

            $validatedData = $request->validate([
                'username' => 'required',
                'password' => 'required',
                'email' => 'required',
                'phone' =>'required',//unique:users,username,except,id
                'image' => '',
                'status'=>'',

                'role_id' =>''



                ]);



                if($request->file('image') !=null){
                    $imageName = $request->file('image')->getClientOriginalExtension();
                    $newName = $request->username.'-'.now()->timestamp.'.'.$imageName;
                    $request->file('image')->move(public_path('images'), $newName);
                    $validatedData['image'] = $newName;

                }else{
                    $validatedData['image'] = $users->image;
                }

                User::where('id',$id)->update($validatedData);


            // $dokters->update();
            Session::flash('status','update success');

               return redirect('/user/index');
           }







}