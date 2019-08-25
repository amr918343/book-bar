<?php

namespace App\Http\Controllers\users;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCategoriesController extends Controller
{
    //

    public function index() {
        $categories = Category::all();
        return view('users.categories.index', compact('categories'));
    }

    public function books($id) {
        $category = Category::findOrFail($id);
        return view('users.categories.books', compact('category'));
    }
}
