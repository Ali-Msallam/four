<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RecipeIngredients;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipeIngredientsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the recipeIngredients can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the recipeIngredients can view the model.
     */
    public function view(User $user, RecipeIngredients $model): bool
    {
        return true;
    }

    /**
     * Determine whether the recipeIngredients can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the recipeIngredients can update the model.
     */
    public function update(User $user, RecipeIngredients $model): bool
    {
        return true;
    }

    /**
     * Determine whether the recipeIngredients can delete the model.
     */
    public function delete(User $user, RecipeIngredients $model): bool
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
     * Determine whether the recipeIngredients can restore the model.
     */
    public function restore(User $user, RecipeIngredients $model): bool
    {
        return false;
    }

    /**
     * Determine whether the recipeIngredients can permanently delete the model.
     */
    public function forceDelete(User $user, RecipeIngredients $model): bool
    {
        return false;
    }
}
