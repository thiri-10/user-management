<?php

namespace App\Models;

// use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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


    public function hasPermission($permissionName, $featureName)
{
    return $this->role->permissions()
        ->whereHas('feature', function($query) use ($featureName) {
            $query->where('name', $featureName);
        })
        ->where('name', $permissionName)
        ->exists();
}

}
