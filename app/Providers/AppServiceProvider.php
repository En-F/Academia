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
        Gate::define('alumno-create', function (User $user){
            return $user->name === 'admin';
        });

        Gate::define('alumno-edit', function (User $user){
            return $user->name === 'admin';
        });

        Gate::define('alumno-delete', function (User $user){
            return $user->name === 'admin';
        });
    }
}
