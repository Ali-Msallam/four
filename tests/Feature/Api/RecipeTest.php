<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Recipe;

use App\Models\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeTest extends TestCase
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
    public function it_gets_recipes_list(): void
    {
        $recipes = Recipe::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.recipes.index'));

        $response->assertOk()->assertSee($recipes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_recipe(): void
    {
        $data = Recipe::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.recipes.store'), $data);

        $this->assertDatabaseHas('recipes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_recipe(): void
    {
        $recipe = Recipe::factory()->create();

        $category = Category::factory()->create();
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'tips' => $this->faker->text,
            'main_img_url' => $this->faker->text(255),
            'views' => 0,
            'expected_cost' => $this->faker->randomNumber(0),
            'expected_time' => $this->faker->time,
            'difficulty level' => $this->faker->randomNumber(0),
            'category_id' => $category->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(route('api.recipes.update', $recipe), $data);

        $data['id'] = $recipe->id;

        $this->assertDatabaseHas('recipes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_recipe(): void
    {
        $recipe = Recipe::factory()->create();

        $response = $this->deleteJson(route('api.recipes.destroy', $recipe));

        $this->assertDeleted($recipe);

        $response->assertNoContent();
    }
}
