<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realTextBetween(1, 10),
            'artist' => $this->faker->name(),
            'genre_id' => $this->faker->numberBetween(1, Genre::all()->count()),
            'duration' => "00:" . date("i:s", mt_rand(1, time())),
        ];
    }
}
