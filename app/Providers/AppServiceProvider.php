<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-page', function (User $user) {
            return $user->role === 'HR';
        });
        Gate::define('view-page-employee', function (User $user) {
            return $user->role === 'Employee';
        });
    }
}
