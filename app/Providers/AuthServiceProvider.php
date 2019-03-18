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

            Gate::define('enseignant', function ($user) {
            return $user->role == "enseignant";
        });
            Gate::define('etudiant', function ($user) {
            return $user->role == "etudiant";
        });
            Gate::define('coordinateur', function ($user) {
            return $user->role == "coordinateur";
        });
            Gate::define('administration', function ($user) {
            return $user->role == "administration";
        });
            Gate::define('superadmin', function ($user) {
            return $user->role == "superadmin";
        });

    }
}
