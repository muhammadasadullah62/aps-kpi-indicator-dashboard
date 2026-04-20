<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Gate::before(function ($user, string $ability) {
            if ($ability !== 'viewPulse') {
                return null;
            }

            if (! $user instanceof User) {
                return false;
            }

            return $user->isAdmin() || $user->isPrincipal();
        });
    }
}
