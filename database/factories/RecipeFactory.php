<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'tips' => $this->faker->text,
            'main_img_url' => $this->faker->text(255),
            'views' => 0,
            'expected_cost' => $this->faker->randomNumber(0),
            'expected_time' => $this->faker->time,
            'difficulty level' => $this->faker->randomNumber(0),
            'category_id' => \App\Models\Category::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
