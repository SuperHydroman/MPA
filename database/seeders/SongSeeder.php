<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $song->genre_id = rand(1, 4);
        $song->duration = "03:00";
        $song->save();
    }
}
