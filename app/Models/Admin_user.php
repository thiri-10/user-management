<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;

    protected $fillable = [
        'name',
        'username',
        'role_id',
        'email',
        'phone',
        'address',
        'password',
        'gender',
        'is_active'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function hasPermission($permissionName)
    {
        $role = $this->role;
        if ($role) {
            // Check if the user's role has the specified permission
            return $role->permissions()->where('name', $permissionName)->exists();
        }
        // Loop through the user's roles
        // foreach ($this->role as $role) {
        //     // Check if any of the user's roles have the specified permission
        //     if ($role->permissions()->where('name', $permissionName)->exists()) {
        //         return true;
        //     }
        // }

        return false;
    }
}
