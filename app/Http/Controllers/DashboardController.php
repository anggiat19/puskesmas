<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
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