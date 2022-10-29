<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        $users = User::with('user')->get();
        return view('user.index',['users'=>$users]);
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
             if(Auth::user()->role_id == 1){
                return redirect('profile');
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


            ]);
            $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
            $request->image->move(public_path('images'), $newName);
        }

            $request['image'] = $newName;

            $request['password'] = Hash::make($request->password);
            $user = User::create([
                'username' => $request['username'],
                'password'=>$request['password'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],

                'image' => $newName
            ]);







            Session::flash('status', 'success');
            Session::flash('message', 'Regist success');
            return redirect('register');

        }





}
