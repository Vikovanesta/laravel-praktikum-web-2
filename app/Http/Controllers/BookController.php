<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageSize = 10;
        $books = Book::orderBy('id', 'desc')->paginate($pageSize);
        $no = $pageSize * ($books->currentPage() - 1);
        $bookCount = Book::count();
        $priceSum = Book::sum('price');

        return view('books.index', compact('books', 'no', 'bookCount', 'priceSum'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $pageSize = 10;
        $books = Book::where('title', 'like', '%'.$search.'%')
            ->orWhere('author', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate($pageSize);
        $no = $pageSize * ($books->currentPage() - 1);
        $bookCount = Book::where('title', 'like', '%'.$search.'%')
            ->orWhere('author', 'like', '%'.$search.'%')
            ->count();
        $priceSum = Book::sum('price');

        return view('books.search', compact('books', 'no', 'bookCount', 'priceSum', 'search'));
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

        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'date_published' => 'required|date',
            'publisher' => [Rule::excludeIf($request->publisher == null), 'string'],
            'description' => [Rule::excludeIf($request->description == null), 'string'],
            'price' => 'required|integer|min:0',
            'page_count' => [Rule::excludeIf($request->page_count == null), 'integer', 'min:0'],
        ]);

        Book::create($data);
        
        return redirect()->route('books.index')->with('success_message', 'Book has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = Book::find($book->id);
        return view('books.show', compact('book'));
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
    public function update(BookUpdateRequest $request, Book $book)
    {
        $book = Book::find($book->id);

        $validated = $request->validated();

        $book->update([
            'title' => $validated['title'] ?? $book->title,
            'author' => $validated['author'] ?? $book->author,
            'date_published' => $validated['date_published'] ?? $book->date_published,
            'publisher' => $validated['publisher'] ?? $book->publisher,
            'description' => $validated['description'] ?? $book->description,
            'price' => $validated['price'] ?? $book->price,
            'page_count' => $validated['page_count'] ?? $book->page_count,
        ]);

        if(isset($validated['cover'])) {
            $coverImg = $validated['cover'];
            $coverImgName = $book->id . '.' . $coverImg->extension();
            $filepath = 'public/books/covers/';

            $coverImg->storeAs($filepath, $coverImgName);
            $coverUrl = config('app.url') . '/storage/books/covers/' . $coverImgName;

            Image::make(storage_path(). '/app/' . $filepath . $coverImgName)
                ->fit(240, 320)
                ->save();

            $book->update([
                'cover_url' => $coverUrl
            ]);
        }

        return redirect()->route('books.index')->with('success_message', 'Book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book = Book::find($book->id);
        $book->delete();
        return redirect()->route('books.index')->with('delete_message', 'Book has been deleted!');
    }
}
