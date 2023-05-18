<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Contracts\Services\RolesServiceContract;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return app(RolesServiceContract::class)->userIsAdmin($user->id);
        });

        Gate::define('manager', function (User $user) {
            return app(RolesServiceContract::class)->userIsManager($user->id);
        });
    }
}
