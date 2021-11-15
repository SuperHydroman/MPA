<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    protected $homepage = 'songs.index';

    public function show() {
        return view($this->homepage, [
            'songs' => Song::all()
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
}
