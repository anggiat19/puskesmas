<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
            // $bookCount = Book::count();
            // $category = Category::count();
            // $userCount = User::count();
           return view('home',[
            // 'book_count' => $bookCount,
            // 'category_count'=>$category,
            // 'user_count'=>$userCount

        ]);


    }
}
