<?php

namespace App\Policies;

use App\Models\Admin_user;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminUserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user,Admin_user $adminUser): bool
    {
        return $adminUser->hasPermission('view','user');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Admin_user $adminUser): bool
    {
        return $adminUser->hasPermission('view','user');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user,Admin_user $adminUser): bool
    {
        return $adminUser->hasPermission('create','user');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Admin_user $adminUser): bool
    {
        return $adminUser->hasPermission('update','user');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Admin_user $adminUser): bool
    {
        return $adminUser->hasPermission('delete','user');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Admin_user $adminUser): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Admin_user $adminUser): bool
    // {
    //     //
    // }
}
