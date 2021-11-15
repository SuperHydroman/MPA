<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $guarded = [];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public static function storeSong($request) {
        $currentTime = Carbon::now('CET')->toDateTimeString();
        $genreId = Genre::where('name', '=', $request->genre)->first()->id;
        $duration = "00:" . $request->minutes . ":" . $request->seconds;

        self::insert([
            'name' => $request->song_name,
            'artist' => $request->artist,
            'genre_id' => $genreId,
            'duration' => $duration,
            'created_at' => $currentTime,
            'updated_at' => $currentTime
        ]);
    }

    public static function updateSong($request, $id) {
        $genreId = Genre::where('name', '=', $request->genre)->first()->id;
        $duration = "00:" . $request->minutes . ":" . $request->seconds;

        self::find($id)->update(['name' => $request->song_name, 'artist' => $request->artist_name, 'genre_id' => $genreId, 'duration' => $duration]);
    }

    public static function deleteSong($id) {
        self::find($id)->delete();
    }
}
