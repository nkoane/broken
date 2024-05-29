<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
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
        //
        Model::preventLazyLoading(true);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(60);
        });

        Gate::define('job.edit', function (User $user, Job $job) {
            return $job->employer->user->is($user);
        });
    }
}
