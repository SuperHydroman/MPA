<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\OperatingSystem;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre = new Genre();
        $genre->name = Str::random(5);
        $genre->save();
    }
}
