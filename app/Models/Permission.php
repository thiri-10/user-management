<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'feature_id'
    ];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function roles()
    {
       
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
    // public function rolePermissions()
    // {
    //     return $this->hasMany(Role_Permission::class, 'permission_id');
    // }

    // public function roles()
    // {
    //     return $this->hasManyThrough(Role::class,Role_Permission::class, 'permission_id', 'id', 'id', 'role_id');
    // }
}
