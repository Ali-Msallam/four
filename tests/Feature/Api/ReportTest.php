<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Report;

use App\Models\Recipe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
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
    public function it_gets_reports_list(): void
    {
        $reports = Report::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.reports.index'));

        $response->assertOk()->assertSee($reports[0]->text);
    }

    /**
     * @test
     */
    public function it_stores_the_report(): void
    {
        $data = Report::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.reports.store'), $data);

        $this->assertDatabaseHas('reports', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_report(): void
    {
        $report = Report::factory()->create();

        $recipe = Recipe::factory()->create();

        $data = [
            'user_id' => $this->faker->randomNumber,
            'text' => $this->faker->text,
            'recipe_id' => $recipe->id,
        ];

        $response = $this->putJson(route('api.reports.update', $report), $data);

        $data['id'] = $report->id;

        $this->assertDatabaseHas('reports', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_report(): void
    {
        $report = Report::factory()->create();

        $response = $this->deleteJson(route('api.reports.destroy', $report));

        $this->assertDeleted($report);

        $response->assertNoContent();
    }
}
