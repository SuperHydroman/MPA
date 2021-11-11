<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
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

/* General Routing */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/profile', [ProfileController::class, 'show'])->middleware(['auth'])->name('profile.index');
/* Song Routing */
Route::get('/songs', [SongController::class, 'show'])->middleware(['auth'])->name('songs.index');
Route::get('/songs/add/{id}', [SongController::class, 'add'])->middleware('auth')->name('songs.add');

/* Playlist Routing */
Route::get('/playlists', [PlaylistController::class, 'show'])->middleware(['auth'])->name('playlists.index');

require __DIR__ . '/auth.php';
