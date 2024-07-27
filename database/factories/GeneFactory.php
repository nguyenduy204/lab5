<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Gene;

class GeneFactory extends Factory
{
    protected $model = Gene::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}

