<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function admin_user()
    {
        return $this->hasMany(Admin_user::class);
    }


    public function permissions()
    {
        
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

   

}
