<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('layout.sidebar_employer', function ($view) {
            $employer = Auth::guard('employer')->user();
            $view->with('employer', $employer);
        });
        view()->composer('layout.sidebar_jobseeker', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
    }
}
