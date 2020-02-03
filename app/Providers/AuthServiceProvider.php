<?php

namespace UserM\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'UserM\Model' => 'UserM\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //users logic gates
        Gate::define('edit.user', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('edit.role', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete.user', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('create.product', function($user){
            return $user->hasAnyRoles(['user','admin']);
        });
       
    }
}
