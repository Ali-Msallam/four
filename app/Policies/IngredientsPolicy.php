<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ingredients;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ingredients can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredients can view the model.
     */
    public function view(User $user, Ingredients $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredients can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredients can update the model.
     */
    public function update(User $user, Ingredients $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredients can delete the model.
     */
    public function delete(User $user, Ingredients $model): bool
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
     * Determine whether the ingredients can restore the model.
     */
    public function restore(User $user, Ingredients $model): bool
    {
        return false;
    }

    /**
     * Determine whether the ingredients can permanently delete the model.
     */
    public function forceDelete(User $user, Ingredients $model): bool
    {
        return false;
    }
}
