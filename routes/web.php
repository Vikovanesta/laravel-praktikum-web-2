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

Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::resource('books', BookController::class);
