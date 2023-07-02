<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the recipe can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the recipe can view the model.
     */
    public function view(User $user, Recipe $model): bool
    {
        return true;
    }

    /**
     * Determine whether the recipe can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the recipe can update the model.
     */
    public function update(User $user, Recipe $model): bool
    {
        return true;
    }

    /**
     * Determine whether the recipe can delete the model.
     */
    public function delete(User $user, Recipe $model): bool
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
     * Determine whether the recipe can restore the model.
     */
    public function restore(User $user, Recipe $model): bool
    {
        return false;
    }

    /**
     * Determine whether the recipe can permanently delete the model.
     */
    public function forceDelete(User $user, Recipe $model): bool
    {
        return false;
    }
}
