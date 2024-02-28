<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\AdminUserPolicy;
use App\Policies\RolePolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        AdminUserPolicy::class,
        RolePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        
    }
}
