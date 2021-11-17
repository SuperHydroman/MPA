<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\arrayHasKey;

class PlaylistSession
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

    public function getSongsFromSession() {
        $songs = array();
        $songIds = Session::get('Playlist');

        foreach ($songIds as $songId) {
            array_push($songs, Song::find($songId));
        }

        return $songs;
    }

    public function addToSession($id) {
        array_push($this->songs, $id);
        Session::put('Playlist', $this->songs);
        Session::save();
    }

    public function deleteFromSession($id) {
        $session = Session::pull('Playlist');
        unset($session[array_search($id, $session)]);
        Session::put('Playlist', $session);
        Session::save();
    }

    public static function savePlaylist($name) {
        $songs = Session::pull('Playlist');
        if ($songs != null) {
            $playlistPush = Playlist::create([
                'name' => $name,
            ]);

            foreach ($songs as $song) {
                SongsPlaylist::create([
                    'song_id' => $song,
                    'playlist_id' => $playlistPush->id
                ]);
            }
        }
    }
}
