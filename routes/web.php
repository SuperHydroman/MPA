<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSessionController;
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

/* >=>=>=>=>= Assigns the 'auth' middleware to the designated Routes! <=<=<=<=<=*/
Route::group(['middleware' => ['auth']], function () {
    /* Profile Routing */
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');

    /* Song Routing */
    Route::get('/songs', [SongController::class, 'show'])->name('songs.index');
    Route::get('/songs/add', [SongController::class, 'add'])->name('songs.add');
    Route::post('/songs/add', [SongController::class, 'store'])->name('songs.store');
    Route::get('/songs/edit/{id}', [SongController::class, 'edit'])->name('songs.edit');
    Route::post('/songs/edit/{id}', [SongController::class, 'update'])->name('songs.update');
    Route::get('/songs/delete/{id}', [SongController::class, 'delete'])->name('songs.delete');
    Route::post('/songs/delete/{id}', [SongController::class, 'remove'])->name('songs.remove');
    Route::post('/songs', [SongController::class, 'filterSongs'])->name('songs.filter');

    /* Genres Routing */
    Route::get('/genres', [GenreController::class, 'show'])->name('genres.index');
    Route::get('/genres/add', [GenreController::class, 'add'])->name('genres.add');
    Route::post('/genres/add', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/genres/edit/{id}', [GenreController::class, 'edit'])->name('genres.edit');
    Route::post('/genres/edit/{id}', [GenreController::class, 'update'])->name('genres.update');
    Route::get('/genres/delete/{id}', [GenreController::class, 'delete'])->name('genres.delete');
    Route::post('/genres/delete/{id}', [GenreController::class, 'remove'])->name('genres.remove');

    /* Playlist Routing */
    Route::get('/playlists', [PlaylistController::class, 'show'])->name('playlists.index');
    Route::get('/playlists/delete/{id}', [PlaylistController::class, 'delete'])->name('playlists.delete');
    Route::post('/playlists/delete/{id}', [PlaylistController::class, 'remove'])->name('playlists.remove');
    Route::get('/playlists/delete-song/{id}', [PlaylistController::class, 'delete_song'])->name('playlists.deleteS');
    Route::post('/playlists/delete-song/{id}', [PlaylistController::class, 'remove_song'])->name('playlists.removeS');
    Route::get('/playlists/info/{id}', [PlaylistController::class, 'details'])->name('playlists.info');

    /* Playlist Session Routing */
    Route::get('/playlist/add/{id}', [PlaylistSessionController::class, 'add'])->name('session.add');
    Route::get('/playlist/delete/{id}', [PlaylistSessionController::class, 'delete'])->name('session.delete');
    Route::post('/playlist/delete/{id}', [PlaylistSessionController::class, 'remove'])->name('session.remove');
    Route::get('/playlist/save', [PlaylistSessionController::class, 'save'])->middleware(['cs'])->name('session.save');
    Route::post('/playlist/save', [PlaylistSessionController::class, 'store'])->name('session.store');
});

require __DIR__ . '/auth.php';
