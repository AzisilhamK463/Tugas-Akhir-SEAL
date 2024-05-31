<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Modul;
use App\Policies\ModulPolicy;
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
        Gate::policy(Modul::class, ModulPolicy::class);
    }
}
