<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RolePermission;

use App\Models\Role;
use App\Models\Permission;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolePermissionTest extends TestCase
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
    public function it_gets_role_permissions_list(): void
    {
        $rolePermissions = RolePermission::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.role-permissions.index'));

        $response->assertOk()->assertSee($rolePermissions[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_role_permission(): void
    {
        $data = RolePermission::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.role-permissions.store'), $data);

        $this->assertDatabaseHas('role_permissions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_role_permission(): void
    {
        $rolePermission = RolePermission::factory()->create();

        $role = Role::factory()->create();
        $permission = Permission::factory()->create();

        $data = [
            'role_id' => $role->id,
            'permission_id' => $permission->id,
        ];

        $response = $this->putJson(
            route('api.role-permissions.update', $rolePermission),
            $data
        );

        $data['id'] = $rolePermission->id;

        $this->assertDatabaseHas('role_permissions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_role_permission(): void
    {
        $rolePermission = RolePermission::factory()->create();

        $response = $this->deleteJson(
            route('api.role-permissions.destroy', $rolePermission)
        );

        $this->assertDeleted($rolePermission);

        $response->assertNoContent();
    }
}
