<?php

namespace App\Policies;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_ad');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ad $ad): bool
    {
        return $user->can('view_ad');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_ad');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ad $ad): bool
    {
        if ($user->hasRole('super_admin')) {
            return $user->can('update_ad');
        }

        return $user->can('update_ad') && $ad->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ad $ad): bool
    {
        if ($user->hasRole('super_admin')) {
            return $user->can('delete_ad');
        }

        return $user->can('delete_ad') && $ad->user_id == $user->id;
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_ad');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Ad $ad): bool
    {
        return $user->can('force_delete_ad');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_ad');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Ad $ad): bool
    {
        return $user->can('restore_ad');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_ad');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Ad $ad): bool
    {
        return $user->can('replicate_ad');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_ad');
    }
}
