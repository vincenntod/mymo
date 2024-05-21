<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin', function (User $user) {
            return $user->level === 'admin';
        });
        Gate::define('gudang', function (User $user) {
            return $user->level === 'gudang';
        });
        Gate::define('pemilik', function (User $user) {
            return $user->level === 'pemilik';
        });
        Gate::define('admin dan gudang', function (User $user) {
            return in_array($user->level, ['admin', 'gudang']);
        });
        Gate::define('admin dan pemilik', function (User $user) {
            return in_array($user->level, ['admin', 'pemilik']);
        });
    }
}
