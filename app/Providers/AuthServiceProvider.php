<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Model' => 'App\Policies\ModelPolicy',
         User::class => UserPolicy::class,
         Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       
        // Auth gates for: admin
        Gate::define('admin_access', function ($user) {
            return in_array($user->roles->title, ['administrator']);
        });
        // Auth gates for: User
        Gate::define('user_access', function ($user) {
            return in_array($user->roles->title, ['user']);
        });

        // Auth gates for: management_access
        Gate::define('management_access', function ($user) {
            return in_array(1, [$user->roles->management_access]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array(1, [$user->roles->role_access]);
        });
        Gate::define('role_create', function ($user) {
            return in_array(1, [$user->roles->role_create]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array(1, [$user->roles->role_edit]);
        });
        Gate::define('role_view', function ($user) {
            return in_array(1, [$user->roles->role_view]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array(1, [$user->roles->role_delete]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array(1, [$user->roles->user_access]);
        });
        Gate::define('user_create', function ($user) {
            return in_array(1, [$user->roles->user_create]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array(1, [$user->roles->user_edit]);
        });
        Gate::define('user_view', function ($user) {
            return in_array(1, [$user->roles->user_view]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array(1, [$user->roles->user_delete]);
        });
    }
}
