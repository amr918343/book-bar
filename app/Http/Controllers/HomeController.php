<?php

namespace App\Http\Controllers;

use App\Models\book\Book;
use App\Models\Category;
use App\Models\user\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $books = Book::all();
        return view('admin.dashboard', compact(['users', 'categories', 'books']));
    }

    public function main() {
        $books = Book::paginate(12);
        $categories = Category::all();
        return view('main_page', compact('books', 'categories'));
    }
}
