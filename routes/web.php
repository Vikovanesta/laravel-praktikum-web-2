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
    return view('welcome');
});

Route::get('/home', function() {
    return view('home', [
        "name" => "Megaman",
        "location" => "Jogja"
    ]);
})->name('home');

Route::get('/profile/{user}', function() {
    return view('profile');
});

Route::get('/character',[CharactersController::class, 'index']);

Route::get('/book',[BookController::class, 'index'])->name('books.index');
Route::get('/book/create',[BookController::class, 'create'])->name('books.create');
Route::post('/book/post',[BookController::class, 'store'])->name('books.store');
Route::delete('/book/{book}/delete',[BookController::class, 'destroy'])->name('books.destroy');
Route::get('/book/{book}/edit',[BookController::class, 'edit'])->name('books.edit');
Route::patch('/book/{book}/update',[BookController::class, 'update'])->name('books.update');