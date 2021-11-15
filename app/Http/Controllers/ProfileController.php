<?php

namespace App\Http\Controllers;

use App\Models\PlaylistSession;

class ProfileController extends Controller
{
    public function show() {
        $p = new PlaylistSession();
        $songs = $p->getSongsFromSession();

        return view('profile.index', [
            'songs' => $songs
        ]);
    }
}
