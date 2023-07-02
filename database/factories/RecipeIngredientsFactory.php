<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\RecipeIngredients;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeIngredientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipeIngredients::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quanttity' => $this->faker->randomNumber(0),
            'reduserCompany' => $this->faker->text(255),
            'is_main_ingredient' => $this->faker->text(255),
            'recipe_id' => \App\Models\Recipe::factory(),
            'ingredients_id' => \App\Models\Ingredients::factory(),
        ];
    }
}
