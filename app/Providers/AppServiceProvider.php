<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
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
        Model::preventLazyLoading(!app()->isProduction()); // Enabled in non-production environments
        // Paginator::useBootstrapFive(); // if I want to use Bootstrap 5 for pagination styling

        // Define a gate to check if the authenticated user can edit a job
        /*Gate::define('edit-job', function ($user, $job) {
            return $user->is($job->employer->user);
        });*/

    }
}
