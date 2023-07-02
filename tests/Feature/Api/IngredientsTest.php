<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ingredients;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngredientsTest extends TestCase
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
    public function it_gets_all_ingredients_list(): void
    {
        $allIngredients = Ingredients::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-ingredients.index'));

        $response->assertOk()->assertSee($allIngredients[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_ingredients(): void
    {
        $data = Ingredients::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-ingredients.store'), $data);

        $this->assertDatabaseHas('ingredients', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ingredients(): void
    {
        $ingredients = Ingredients::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(
            route('api.all-ingredients.update', $ingredients),
            $data
        );

        $data['id'] = $ingredients->id;

        $this->assertDatabaseHas('ingredients', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ingredients(): void
    {
        $ingredients = Ingredients::factory()->create();

        $response = $this->deleteJson(
            route('api.all-ingredients.destroy', $ingredients)
        );

        $this->assertDeleted($ingredients);

        $response->assertNoContent();
    }
}
