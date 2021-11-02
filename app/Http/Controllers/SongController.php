<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function show() {
        return view('songs.index', [
            'songs' => Song::all()
        ]);
    }

    public function add($id) {
        return view('songs.add', [
            'test' =>  Song::find($id)
        ]);
    }
}
