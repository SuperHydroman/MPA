<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\PlaylistSession;

class PlaylistController extends Controller
{
    public function show() {
        return view('playlists/index', [
            'playlists' => Playlist::all()
        ]);
    }

    public function delete($id) {
        $p = new PlaylistSession();
        $p->deleteFromSession($id);

        return redirect()->route('profile.index');
    }
}
