<?php

namespace App\Policies;

use App\Models\Rate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rate can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rate can view the model.
     */
    public function view(User $user, Rate $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rate can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the rate can update the model.
     */
    public function update(User $user, Rate $model): bool
    {
        return true;
    }

    /**
     * Determine whether the rate can delete the model.
     */
    public function delete(User $user, Rate $model): bool
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
     * Determine whether the rate can restore the model.
     */
    public function restore(User $user, Rate $model): bool
    {
        return false;
    }

    /**
     * Determine whether the rate can permanently delete the model.
     */
    public function forceDelete(User $user, Rate $model): bool
    {
        return false;
    }
}
