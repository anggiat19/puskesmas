<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    public function index(Request $request)

    {


            $search = $request->search;

            $emails = Email::where('name','LIKE','%'.$search.'%')
            ->orWhere('email',$search)
            ->orWhere('pesan','LIKE','%'.$search.'%')
            ->paginate(5);

            return view('email.index',['emails'=>$emails]);

        // return view('email.index');

        // return view('email.index', [
        //     'emails' => DB::table('emails')->paginate(1)
        // ]);
     }
     public function home()
     {
             // $bookCount = Book::count();
             // $category = Category::count();
             // $userCount = User::count();
            return view('home'             // 'book_count' => $bookCount,
             // 'category_count'=>$category,
             // 'user_count'=>$userCount

         );


     }

     public function store(Request $request)

     {
         // $validated = $request->validate([
         //     'name' => 'required|unique:categories|max:100',

         // ]);
         $homes =Email::create($request->all());
         return redirect('/')->with('status', 'Pasien Added Successfully');
     }

     public function delete($id)
    {
        $emails = Email::findOrFail($id);
        return view('email.delete',['emails'=>$emails]);
    }

    public function destroy($id)
    {
       $deleteemail = Email::findOrFail($id);
       $deleteemail->delete();

        if($deleteemail){
            Session::flash('status',' delete success');
            Session::flash('message','delete email succes');
        }
       return redirect('/email/index');
    }

}