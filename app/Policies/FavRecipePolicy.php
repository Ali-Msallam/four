<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FavRecipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class FavRecipePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the favRecipe can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the favRecipe can view the model.
     */
    public function view(User $user, FavRecipe $model): bool
    {
        return true;
    }

    /**
     * Determine whether the favRecipe can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the favRecipe can update the model.
     */
    public function update(User $user, FavRecipe $model): bool
    {
        return true;
    }

    /**
     * Determine whether the favRecipe can delete the model.
     */
    public function delete(User $user, FavRecipe $model): bool
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
     * Determine whether the favRecipe can restore the model.
     */
    public function restore(User $user, FavRecipe $model): bool
    {
        return false;
    }

    /**
     * Determine whether the favRecipe can permanently delete the model.
     */
    public function forceDelete(User $user, FavRecipe $model): bool
    {
        return false;
    }
}
