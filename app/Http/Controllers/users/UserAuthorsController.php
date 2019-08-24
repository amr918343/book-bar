<?php

namespace App\Http\Controllers\users;

use App\Models\user\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuthorsController extends Controller
{
    //index
    public function index() {
        $authors = Author::paginate(12);
        return view('users.authors.index', compact('authors'));
    }

    public function books($id) {
        $author = Author::findOrFail($id);
        return view('users.authors.books', compact('author'));
    }
}