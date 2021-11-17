<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function removePlaylist($id) {
        $data = SongsPlaylist::where('playlist_id', '=', $id)->get();
        if ($data->count() >= 0) {
            foreach ($data as $song) {
                SongsPlaylist::find($song->id)->delete();
            }
        }
        self::find($id)->delete();
    }
}
