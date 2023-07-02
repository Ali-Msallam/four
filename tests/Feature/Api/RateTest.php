<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rate;

use App\Models\Recipe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RateTest extends TestCase
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
    public function it_gets_rates_list(): void
    {
        $rates = Rate::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.rates.index'));

        $response->assertOk()->assertSee($rates[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_rate(): void
    {
        $data = Rate::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.rates.store'), $data);

        $this->assertDatabaseHas('rates', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_rate(): void
    {
        $rate = Rate::factory()->create();

        $recipe = Recipe::factory()->create();

        $data = [
            'user_id' => $this->faker->randomNumber,
            'number' => $this->faker->randomNumber,
            'recipe_id' => $recipe->id,
        ];

        $response = $this->putJson(route('api.rates.update', $rate), $data);

        $data['id'] = $rate->id;

        $this->assertDatabaseHas('rates', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_rate(): void
    {
        $rate = Rate::factory()->create();

        $response = $this->deleteJson(route('api.rates.destroy', $rate));

        $this->assertDeleted($rate);

        $response->assertNoContent();
    }
}
