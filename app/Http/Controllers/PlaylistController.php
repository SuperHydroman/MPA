<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\PlaylistSession;
use App\Models\Song;
use App\Models\SongsPlaylist;

class PlaylistController extends Controller
{
    public function show() {
        return view('playlists.index', [
            'playlists' => Playlist::all()
        ]);
    }

    public function delete($id) {
        return view('playlists.delete');
    }

    public function remove($id) {
        return redirect()->route('playlists.index');
    }

    public function details($id) {
        $songIds = SongsPlaylist::all()->where('playlist_id', '=', $id);
        $songs = array();
        $duration = null;

        foreach ($songIds as $songId) {
            array_push($songs, Song::find($songId->song_id));
        }

        foreach ($songs as $song) {
            $duration += strtotime($song->duration);
        }

        return view('playlists.info', [
            'playlist' => Playlist::find($id),
            'songs' => $songs,
            'duration' => date("H:i:s", $duration)
        ]);
    }
}
