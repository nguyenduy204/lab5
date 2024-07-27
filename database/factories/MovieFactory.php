<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Gene;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'poster' => $this->faker->imageUrl,
            'intro' => $this->faker->text,
            'release_date' => $this->faker->date,
            'genre_id' => Gene::factory(),
        ];
    }
}
