<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the like can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the like can view the model.
     */
    public function view(User $user, Like $model): bool
    {
        return true;
    }

    /**
     * Determine whether the like can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the like can update the model.
     */
    public function update(User $user, Like $model): bool
    {
        return true;
    }

    /**
     * Determine whether the like can delete the model.
     */
    public function delete(User $user, Like $model): bool
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
     * Determine whether the like can restore the model.
     */
    public function restore(User $user, Like $model): bool
    {
        return false;
    }

    /**
     * Determine whether the like can permanently delete the model.
     */
    public function forceDelete(User $user, Like $model): bool
    {
        return false;
    }
}
