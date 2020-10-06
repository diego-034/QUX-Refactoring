<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /**
         * Definiendo con Gate las validaciones de seguridad 
         * para utiliza dentro de el middleware
         */
        Gate::define('admin', function ($user, $us) {
            if (1 == $us->user_type) {
                return true;
            }
            return false;
        });

        Gate::define('customer', function ($user, $us) {
            if (2 == $us->user_type) {
                return true;
            }
            return false;
        });
    }
}
