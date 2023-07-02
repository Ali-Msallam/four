<?php

namespace App\Policies;

use App\Models\Step;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StepPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the step can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the step can view the model.
     */
    public function view(User $user, Step $model): bool
    {
        return true;
    }

    /**
     * Determine whether the step can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the step can update the model.
     */
    public function update(User $user, Step $model): bool
    {
        return true;
    }

    /**
     * Determine whether the step can delete the model.
     */
    public function delete(User $user, Step $model): bool
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
     * Determine whether the step can restore the model.
     */
    public function restore(User $user, Step $model): bool
    {
        return false;
    }

    /**
     * Determine whether the step can permanently delete the model.
     */
    public function forceDelete(User $user, Step $model): bool
    {
        return false;
    }
}
