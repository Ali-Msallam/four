<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\RolePermission;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolePermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RolePermission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => \App\Models\Role::factory(),
            'permission_id' => \App\Models\Permission::factory(),
        ];
    }
}
