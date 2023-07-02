<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserRolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the userRole can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the userRole can view the model.
     */
    public function view(User $user, UserRole $model): bool
    {
        return true;
    }

    /**
     * Determine whether the userRole can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the userRole can update the model.
     */
    public function update(User $user, UserRole $model): bool
    {
        return true;
    }

    /**
     * Determine whether the userRole can delete the model.
     */
    public function delete(User $user, UserRole $model): bool
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
     * Determine whether the userRole can restore the model.
     */
    public function restore(User $user, UserRole $model): bool
    {
        return false;
    }

    /**
     * Determine whether the userRole can permanently delete the model.
     */
    public function forceDelete(User $user, UserRole $model): bool
    {
        return false;
    }
}
