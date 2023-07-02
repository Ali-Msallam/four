<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Report;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the report can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the report can view the model.
     */
    public function view(User $user, Report $model): bool
    {
        return true;
    }

    /**
     * Determine whether the report can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the report can update the model.
     */
    public function update(User $user, Report $model): bool
    {
        return true;
    }

    /**
     * Determine whether the report can delete the model.
     */
    public function delete(User $user, Report $model): bool
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
     * Determine whether the report can restore the model.
     */
    public function restore(User $user, Report $model): bool
    {
        return false;
    }

    /**
     * Determine whether the report can permanently delete the model.
     */
    public function forceDelete(User $user, Report $model): bool
    {
        return false;
    }
}
