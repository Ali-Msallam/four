<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RecipeIngredients;

use App\Models\Recipe;
use App\Models\Ingredients;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeIngredientsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_all_recipe_ingredients_list(): void
    {
        $allRecipeIngredients = RecipeIngredients::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-recipe-ingredients.index'));

        $response
            ->assertOk()
            ->assertSee($allRecipeIngredients[0]->reduserCompany);
    }

    /**
     * @test
     */
    public function it_stores_the_recipe_ingredients(): void
    {
        $data = RecipeIngredients::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-recipe-ingredients.store'),
            $data
        );

        $this->assertDatabaseHas('recipe_ingredients', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_recipe_ingredients(): void
    {
        $recipeIngredients = RecipeIngredients::factory()->create();

        $recipe = Recipe::factory()->create();
        $ingredients = Ingredients::factory()->create();

        $data = [
            'quanttity' => $this->faker->randomNumber(0),
            'reduserCompany' => $this->faker->text(255),
            'is_main_ingredient' => $this->faker->text(255),
            'recipe_id' => $recipe->id,
            'ingredients_id' => $ingredients->id,
        ];

        $response = $this->putJson(
            route('api.all-recipe-ingredients.update', $recipeIngredients),
            $data
        );

        $data['id'] = $recipeIngredients->id;

        $this->assertDatabaseHas('recipe_ingredients', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_recipe_ingredients(): void
    {
        $recipeIngredients = RecipeIngredients::factory()->create();

        $response = $this->deleteJson(
            route('api.all-recipe-ingredients.destroy', $recipeIngredients)
        );

        $this->assertDeleted($recipeIngredients);

        $response->assertNoContent();
    }
}
