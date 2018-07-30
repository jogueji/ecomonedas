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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('management',function($user){
            return $user->hasAccess(['management']);
        });

        Gate::define('redeem', function($user){
          return $user -> hasAccess(['redeem']);
        });

        Gate::define('buy', function($user){
          return $user -> hasAccess(['buy']);
        });
        /*
        Gate::define('buy', function($user){
            return $user->tieneRol('supervisor') or $user->tieneRol('propietario');
        });

        Gate::define('publish-vj', function($user){
            return $user->tieneAcceso(['publish-vj']);
        });*/
        //
    }
}
