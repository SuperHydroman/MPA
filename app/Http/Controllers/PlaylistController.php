<?php

namespace App\Http\Controllers;

use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function show() {
        return view('playlists/index', [
            'playlists' => Playlist::all()
        ]);
    }
}
