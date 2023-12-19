<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index()
    {
        $no = 1;
        $bookCategories = BookCategory::all();
        return view('book-categories.index', compact('bookCategories', 'no'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:book_categories,name',
        ]);

        $bookCategory = BookCategory::create($request->all());

        return redirect()->route('book-categories.index')->with('success', 'Book category created successfully.');
    }

    public function create()
    {
        return view('book-categories.create');
    }

    public function edit(BookCategory $bookCategory)
    {
        return view('book-categories.edit', compact('bookCategory'));
    }

    public function update(Request $request, BookCategory $bookCategory)
    {
        $request->validate([
            'name' => 'required|unique:book_categories,name,' . $bookCategory->id,
        ]);
        $bookCategory->update($request->all());
        return redirect()->route('book-categories.index')->with('success', 'Book category updated successfully.');
    }

    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();
        return redirect()->route('book-categories.index')->with('success', 'Book category deleted successfully.');
    }
}
