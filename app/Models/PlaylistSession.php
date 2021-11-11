<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class PlaylistSession extends Model
{
    use HasFactory;
    private $songs = array();

    public function __construct()
    {
        if (!Session::exists('Playlist')) {
            Session::put('Playlist', $this->songs);
        } else {
            $this->songs = Session::get('Playlist');
        }
        Session::save();
    }

    public function addToSession($id) {
        array_push($this->songs, $id);
        Session::put('Playlist', $this->songs);
        Session::save();
    }
}
