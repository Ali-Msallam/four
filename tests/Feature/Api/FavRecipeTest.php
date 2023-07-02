<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FavRecipe;

use App\Models\Recipe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavRecipeTest extends TestCase
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
    public function it_gets_fav_recipes_list(): void
    {
        $favRecipes = FavRecipe::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.fav-recipes.index'));

        $response->assertOk()->assertSee($favRecipes[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_fav_recipe(): void
    {
        $data = FavRecipe::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.fav-recipes.store'), $data);

        $this->assertDatabaseHas('fav_recipes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_fav_recipe(): void
    {
        $favRecipe = FavRecipe::factory()->create();

        $recipe = Recipe::factory()->create();

        $data = [
            'user_id' => $this->faker->randomNumber,
            'recipe_id' => $recipe->id,
        ];

        $response = $this->putJson(
            route('api.fav-recipes.update', $favRecipe),
            $data
        );

        $data['id'] = $favRecipe->id;

        $this->assertDatabaseHas('fav_recipes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_fav_recipe(): void
    {
        $favRecipe = FavRecipe::factory()->create();

        $response = $this->deleteJson(
            route('api.fav-recipes.destroy', $favRecipe)
        );

        $this->assertDeleted($favRecipe);

        $response->assertNoContent();
    }
}
