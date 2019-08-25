<?php

namespace App\Http\Controllers\users;

use App\Models\book\Book;
use App\Models\book\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UserBookController extends Controller
{
    //Show Book
    public function show($id) {
        $book = Book::findOrFail($id);
        return View('users.book', compact('book'));
    }
    //Download Book
    public function download($id) {
        $pdf = Pdf::findOrFail($id);

        $file = public_path() . '/' . $pdf->file;
        $headers = array('Content-Type: application/pdf',);
        Response::download($file, str_replace('pdf/', '', $pdf->file), $headers);
        session('msg-success', 'File Downloaded');
        return redirect()->back();
    }
}
