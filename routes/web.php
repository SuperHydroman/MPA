<?php

use App\Http\Controllers\SongController;
use App\Models\Song;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('/songs', [SongController::class, 'show'])->middleware(['auth'])->name('songs');

Route::get('/playlists', function () {
    return view('playlists');
})->middleware(['auth'])->name('playlists');

require __DIR__ . '/auth.php';
