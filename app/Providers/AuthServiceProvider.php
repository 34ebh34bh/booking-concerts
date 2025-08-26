<?php
namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider; // ✅ правильный импорт


class AuthServiceProvider extends ServiceProvider

{
    protected $policies = [

    ];
    public function boot(): void
    {
        Gate::define('Support', function (User $user) {
            return $user->role === 'support';
        });

        Gate::define('Admin', function (User $user) {
            return $user->role === 'Admin';
        });
    }

}
