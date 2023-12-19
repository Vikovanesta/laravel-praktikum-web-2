<?php

use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\BookController;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','admin'])->group(function () {
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::put('/books/categories', [BookController::class, 'toggleCategory'])->name('books.toggleCategory');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('/book-categories', [BookCategoryController::class, 'index'])->name('book-categories.index');
    Route::get('/book-categories/create', [BookCategoryController::class, 'create'])->name('book-categories.create');
    Route::post('/book-categories', [BookCategoryController::class, 'store'])->name('book-categories.store');
    Route::get('/book-categories/{bookCategory}/edit', [BookCategoryController::class, 'edit'])->name('book-categories.edit');
    Route::patch('/book-categories/{bookCategory}', [BookCategoryController::class, 'update'])->name('book-categories.update');
    Route::delete('/book-categories/{bookCategory}', [BookCategoryController::class, 'destroy'])->name('book-categories.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/books/{book}/ratings', [BookController::class, 'rate'])->name('books.rate');
    Route::get('/books/myfavourites', [BookController::class, 'indexFavourites'])->name('books.indexFavourites');
    Route::put('/books/myfavourites', [BookController::class, 'favourite'])->name('books.toggleFavourite');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/books/popular', [BookController::class, 'indexPopular'])->name('books.indexPopular');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('/character',[CharactersController::class, 'index']);

require __DIR__.'/auth.php';
