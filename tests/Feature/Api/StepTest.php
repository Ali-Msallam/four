<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Step;

use App\Models\Recipe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StepTest extends TestCase
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
    public function it_gets_steps_list(): void
    {
        $steps = Step::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.steps.index'));

        $response->assertOk()->assertSee($steps[0]->content);
    }

    /**
     * @test
     */
    public function it_stores_the_step(): void
    {
        $data = Step::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.steps.store'), $data);

        $this->assertDatabaseHas('steps', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_step(): void
    {
        $step = Step::factory()->create();

        $recipe = Recipe::factory()->create();

        $data = [
            'content' => $this->faker->text,
            'number' => $this->faker->randomNumber,
            'recipe_id' => $recipe->id,
        ];

        $response = $this->putJson(route('api.steps.update', $step), $data);

        $data['id'] = $step->id;

        $this->assertDatabaseHas('steps', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_step(): void
    {
        $step = Step::factory()->create();

        $response = $this->deleteJson(route('api.steps.destroy', $step));

        $this->assertDeleted($step);

        $response->assertNoContent();
    }
}
