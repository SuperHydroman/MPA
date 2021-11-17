<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    private $filter = 'default';

    protected $homepage = 'songs.index';

    public function show() {
        return view($this->homepage, [
            'songs' => Song::all(),
            'filter' => $this->filter,
            'genres' => Genre::all(),
        ]);
    }

    public function add() {
        return view('songs.add', [
            'genres' => Genre::all()
        ]);
    }

    public function store(Request $request) {
        Song::storeSong($request);

        return redirect()->route($this->homepage);
    }

    public function edit($id) {
        $s = Song::find($id);
        $timestamp = strtotime($s->duration);
        $minutes =  date("i", $timestamp);
        $seconds = date("s", $timestamp);

        return view('songs.update', [
            'song' => $s,
            'minutes' => $minutes,
            'seconds' => $seconds,
            'genre' => Genre::find($s->genre_id),
            'genres' => Genre::all()
        ]);
    }

    public function update(Request $request, $id) {
        Song::updateSong($request, $id);

        return redirect()->route($this->homepage);
    }

    public function delete($id) {
        $s = Song::find($id);
        $timestamp = strtotime($s->duration);
        $minutes =  date("i", $timestamp);
        $seconds = date("s", $timestamp);

        return view('songs.delete', [
            'song' => $s,
            'minutes' => $minutes,
            'seconds' => $seconds,
            'genre' => Genre::find($s->genre_id)
        ]);
    }

    public function remove($id) {
        Song::deleteSong($id);

        return redirect()->route($this->homepage);
    }

    public function filterSongs(Request $request) {
        if ($request->option != 'default') {
            $genre_id = Genre::where('name', '=', $request->option)->first()->id;
            $songs = Song::where('genre_id', '=', $genre_id)->get();
            $this->filter = $request->option;
        }
        else {
            $songs = Song::all();
        }

        return view($this->homepage, [
            'songs' => $songs,
            'filter' => $this->filter,
            'genres' => Genre::all(),
        ]);
    }
}
