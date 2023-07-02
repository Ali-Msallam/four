<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RolePermission;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rolePermission can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rolePermission can view the model.
     */
    public function view(User $user, RolePermission $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rolePermission can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rolePermission can update the model.
     */
    public function update(User $user, RolePermission $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rolePermission can delete the model.
     */
    public function delete(User $user, RolePermission $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rolePermission can restore the model.
     */
    public function restore(User $user, RolePermission $model): bool
    {
        return false;
    }

    /**
     * Determine whether the rolePermission can permanently delete the model.
     */
    public function forceDelete(User $user, RolePermission $model): bool
    {
        return false;
    }
}
