<?php

namespace App\Providers;

use App\Policies\UserPolicy;
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
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('users.standart','App\Policies\UserPolicy@standart');
        Gate::define('users.moderator','App\Policies\UserPolicy@moderator');
        Gate::define('users.admin','App\Policies\UserPolicy@admin');
        Gate::define('users.common','App\Policies\UserPolicy@common');
    }
}
