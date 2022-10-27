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
        $users = User::all();
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
             if(Auth::user()->role_id == 2){
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
            return redirect('login');
        }

        public function registerprocess(Request $request)
        {

            $picturename = '';

            if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->username.'-'.now()->timestamp.'.'.$extension;
             $request->file('image')->storeAs('photo',$newName);
            }


            
            // dd($request->all());
            $validated = $request->validate([
                'username' => 'required|unique:users|max:255',
                'password' => 'required|max:255',
                'email' => 'required',
                'phone' => 'max:255',
                'image'=> 'mimes:jpg,png,jpeg|image|max:2048',


            ]);

            $user['image']



            Session::flash('status', 'success');
            Session::flash('message', 'Regist success');
            return redirect('/register');

        }



}