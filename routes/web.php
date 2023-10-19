<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\BookController;

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
    return redirect('/books');
});

Route::get('/home', function() {
    return view('home', [
        "name" => "Megaman",
        "location" => "Jogja"
    ]);
})->name('home');

Route::get('/character',[CharactersController::class, 'index']);

Route::resource('books', BookController::class);

// Route::get('/books/create',[BookController::class, 'create'])->name('books.create');
// Route::post('/books/post',[BookController::class, 'store'])->name('books.store');
// Route::get('/books',[BookController::class, 'index'])->name('books.index');
// Route::get('/books/{book}',[BookController::class, 'show'])->name('books.show');
// Route::delete('/books/{book}/delete',[BookController::class, 'destroy'])->name('books.destroy');
// Route::get('/books/{book}/edit',[BookController::class, 'edit'])->name('books.edit');
// Route::patch('/books/{book}/update',[BookController::class, 'update'])->name('books.update');