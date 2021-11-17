<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongsPlaylist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function playlists(){
        return $this->hasOne(Playlist::class, 'id', 'playlist_id');
    }

    public function songs() {
        return $this->hasOne(Song::class, 'id', 'song_id');
    }

    public static function removeSongFromPlaylist($id) {
        self::find($id)->delete();
    }
}
