<?php

namespace Database\Factories;

use App\Models\Step;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Step::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->text,
            'number' => $this->faker->randomNumber,
            'recipe_id' => \App\Models\Recipe::factory(),
        ];
    }
}
