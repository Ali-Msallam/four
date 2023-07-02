<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\UserRole;

use App\Models\Role;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRoleTest extends TestCase
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
    public function it_gets_user_roles_list(): void
    {
        $userRoles = UserRole::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.user-roles.index'));

        $response->assertOk()->assertSee($userRoles[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_user_role(): void
    {
        $data = UserRole::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.user-roles.store'), $data);

        $this->assertDatabaseHas('user_roles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_user_role(): void
    {
        $userRole = UserRole::factory()->create();

        $user = User::factory()->create();
        $role = Role::factory()->create();

        $data = [
            'user_id' => $user->id,
            'role_id' => $role->id,
        ];

        $response = $this->putJson(
            route('api.user-roles.update', $userRole),
            $data
        );

        $data['id'] = $userRole->id;

        $this->assertDatabaseHas('user_roles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_user_role(): void
    {
        $userRole = UserRole::factory()->create();

        $response = $this->deleteJson(
            route('api.user-roles.destroy', $userRole)
        );

        $this->assertDeleted($userRole);

        $response->assertNoContent();
    }
}
