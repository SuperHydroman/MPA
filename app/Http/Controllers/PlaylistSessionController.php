<?php

namespace App\Http\Controllers;

use App\Models\PlaylistSession;
use Illuminate\Http\Request;

class PlaylistSessionController extends Controller
{
    protected $homepage = 'profile.index';

    public function add($id) {
        $p = new PlaylistSession();
        $p->addToSession($id);

        return redirect()->route('songs.index');
    }

    public function delete($id) {
        $p = new PlaylistSession();
        $p->deleteFromSession($id);

        return redirect()->route($this->homepage);
    }

    public function save() {
        return view('playlists.add');
    }

    public function store(Request $request) {
        PlaylistSession::savePlaylist($request->playlist_name);

        return redirect()->route($this->homepage);
    }
}
