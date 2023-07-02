<?php

namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->randomNumber,
            'recipe_id' => \App\Models\Recipe::factory(),
        ];
    }
}
