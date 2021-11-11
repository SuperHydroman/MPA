<?php

namespace App\Http\Controllers;

use App\Models\Song;

class ProfileController extends Controller
{
    public function show() {
        return view('profile.index', [
            'songs' => Song::getSongsFromSession()
        ]);
    }
}
