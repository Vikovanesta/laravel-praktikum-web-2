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

Route::get('/book',[BookController::class, 'index']);