<?php

namespace Database\Factories;

use App\Models\FavRecipe;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavRecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FavRecipe::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => \App\Models\Recipe::factory(),
        ];
    }
}
