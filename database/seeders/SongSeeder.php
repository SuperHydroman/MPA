<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $song = new Song();
        $song->name = Str::random(10);
        $song->artist = Str::random(10);
        $song->genre_id = rand(1, Genre::all()->count());
        $song->duration = "00:" . date("i:s", mt_rand(1, time()));
        $song->save();
    }
}
