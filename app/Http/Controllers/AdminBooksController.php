<?php

namespace App\Http\Controllers;

use App\Models\book\Book;
use App\Models\book\BookPhoto;
use App\Models\Category;
use App\Models\book\Pdf;
use App\Models\user\Author;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::paginate(5);

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'author_id' => 'required|string',
            'description' => 'required|string|min:10',
            'category_id' => 'required',
            'photo_id' => 'mimes:jpeg,jpg,png,gif',
            "pdf_id" => "required_with:photo_id|mimes:pdf"
        ]);

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images/books', $name);

            $photo = BookPhoto::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        if ($file = $request->file('pdf_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('pdf', $name);

            $pdf = Pdf::create(['file' => $name]);

            $input['pdf_id'] = $pdf->id;

        }
        if ($author = Author::where('name', $input['author_id'])->first()) {
        } else {
            $author = Author::create(['name' => $input['author_id']]);
        }
        $input['author_id'] = $author->id;
        Book::create($input);

        return redirect('auth/books');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'photo_id' => 'mimes:jpeg,jpg,png,gif',
            "pdf_id" => "mimes:pdf",
            'author_id' => 'required|string',
            'description' => 'required|string|min:10',
        ]);

        $input = $request->except(['_token', '_method']);

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images/books', $name);

            $photo = BookPhoto::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        if ($file = $request->file('pdf_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('pdf', $name);

            $pdf = Pdf::create(['file' => $name]);

            $input['pdf_id'] = $pdf->id;

        }
        if ($author = Author::where('name', $input['author_id'])->first()) {
        } else {
            $author = Author::create(['name' => $input['author_id']]);
        }
        $input['author_id'] = $author->id;

        Book::whereId($id)->update($input);

        return redirect('auth/books');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::findOrFail($id);
        if ($book->photo) {
            unlink(ltrim($book->photo->file, '/'));
            unlink(ltrim($book->photo->file, '/'));
            $book->delete();
        }
        return redirect('auth/books');
    }


    public function deleteSelected(Request $request)
    {

        $books = Book::findOrFail($request->checkBoxArray);
        foreach ($books as $book) {

            unlink(ltrim($book->photo->file, '/'));
            unlink(ltrim($book->pdf->file, '/'));
            $book->delete();
        }
        return redirect()->back();
    }
}
