<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Advertisement;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdvertisementTest extends TestCase
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
    public function it_gets_advertisements_list(): void
    {
        $advertisements = Advertisement::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.advertisements.index'));

        $response->assertOk()->assertSee($advertisements[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_advertisement(): void
    {
        $data = Advertisement::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.advertisements.store'), $data);

        $this->assertDatabaseHas('advertisements', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_advertisement(): void
    {
        $advertisement = Advertisement::factory()->create();

        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->text,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.advertisements.update', $advertisement),
            $data
        );

        $data['id'] = $advertisement->id;

        $this->assertDatabaseHas('advertisements', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_advertisement(): void
    {
        $advertisement = Advertisement::factory()->create();

        $response = $this->deleteJson(
            route('api.advertisements.destroy', $advertisement)
        );

        $this->assertDeleted($advertisement);

        $response->assertNoContent();
    }
}
