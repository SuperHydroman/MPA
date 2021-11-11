<?php

namespace App\Http\Controllers;

use App\Models\PlaylistSession;
use App\Models\Song;

class SongController extends Controller
{
    public function show() {
        return view('songs.index', [
            'songs' => Song::all()
        ]);
    }

    public function add($id) {
        $p = new PlaylistSession();
        $p->addToSession($id);

        return redirect()->route('songs.index');
//        return view('songs.add', [
//            'song' =>  Song::find($id)
//        ]);
    }
}
