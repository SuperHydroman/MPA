<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function show() {
        return view('songs', [
            'songs' => Song::all()
        ]);
    }
}
