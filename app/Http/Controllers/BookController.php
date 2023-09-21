<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all()->sortByDesc('id');
        $no = 0;
        $bookCount = Book::count();
        $priceSum = Book::sum('price');

        return view('books.index', compact('books', 'no', 'bookCount', 'priceSum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Change date format to 'd-m-Y'
        $request->merge([
            'date_published' => date('d-m-Y', $request->date_published)
        ]);


        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'description' => 'nullable',
            'publisher' => 'nullable',
            'date_published' => ['nullable', 'date'],
            'price' => 'required',
            'page_count' => 'nullable',
            'cover_url' => 'nullable',
        ]);

        Book::create($data);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $book = Book::find($book->id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book = Book::find($book->id);
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book = Book::find($book->id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
