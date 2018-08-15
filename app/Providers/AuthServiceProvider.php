<?php

namespace App\Providers;
use App\Collectioncenter;
use App\User;
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
          if($user -> hasAccess(['redeem'])){
            if(User::where('id',$user->collectioncenter_id)->exists())
              return Collectioncenter::find($user->collectioncenter_id)->enabled;
          }
          return false;
        });

        Gate::define('edit-user', function($user,\App\User $userEdit){
          return ($user -> hasAccess(['management']) and $userEdit->rol_id==2) or $userEdit->id==\Auth::user()->id;
        });

        Gate::define('delete-user', function($user,\App\User $userDelete){
          return ($user -> hasAccess(['management']) and $userDelete->rol_id==2);
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
