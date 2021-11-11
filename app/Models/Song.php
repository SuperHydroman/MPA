<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Song extends Model
{
    use HasFactory;

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public static function getSongsFromSession() {
        $songs = array();
        $songIds = Session::get('Playlist');

        foreach ($songIds as $songId) {
           array_push($songs, self::find($songId));
        }
        return $songs;
    }
}
