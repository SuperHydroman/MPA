<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\SongsPlaylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PlaylistController extends Controller
{
    public function show() {
        return view('playlists.index', [
            'playlists' => Playlist::all()
        ]);
    }

    public function delete($id) {
        return view('playlists.delete', [
            'playlist' => Playlist::find($id),
        ]);
    }

    public function remove($id) {
        Playlist::removePlaylist($id);

        return redirect()->route('playlists.index');
    }

    public function delete_song($id) {
        return view('playlists.deleteS', [
            'song' => SongsPlaylist::find($id),
        ]);
    }

    public function remove_song($id) {
        SongsPlaylist::removeSongFromPlaylist($id);

        return redirect()->route('playlists.index');
    }

    public function details($id) {
        $songIds = SongsPlaylist::where('playlist_id', '=', $id)->get();
        $songs = array();

        $duration = null;

        foreach ($songIds as $songId) {
            array_push($songs, Song::find($songId->song_id));
        }

        foreach ($songs as $song) {
            $duration += strtotime($song->duration);
        }

        return view('playlists.info', [
            'playlist' => $songIds,
            'duration' => date("H:i:s", $duration)
        ]);
    }
}
