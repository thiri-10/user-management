<?php

namespace App\Policies;

use App\Models\Admin_user;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin_user $user): bool
    {
        return $user->hasPermission('View');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin_user $user, Role $role): bool
    {
        return $user->hasPermission('View');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin_user $user): bool
    {
        return $user->hasPermission('Create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin_user $user, Role $role): bool
    {
        return $user->hasPermission('Update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin_user $user, Role $role): bool
    {
        return $user->hasPermission('Delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Role $role): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Role $role): bool
    // {
    //     //
    // }
}
