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
        view()->composer('layout.sidebar_chat', function ($view) {
            $user = Auth::user();
            $applications = $user->applications;
            $employers = [];
            foreach ($applications as $application) {
                $employer = $application->job->employer;
                if (!in_array($employer, $employers)) {
                    $employers[] = $employer;
                }
            }
            $view->with('employers', $employers);
        });
        view()->composer('layout.sidebar_chat2', function ($view) {
            $employer = Auth::guard('employer')->user();
            $jobs = $employer->jobs;
            $users = [];
            foreach ($jobs as $job) {
                foreach ($job->applications as $application)
                    $user = $application->user;
                if (!in_array($user, $users)) {
                  
                    $users[] = $user ;
                }
                   
            }

            $view->with('users', $users);
        });
    }
}
