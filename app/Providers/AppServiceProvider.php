<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

            /*
            ->response(function (Request $request, array $headers) {
                return response('Ux-authorized.', 429, $headers);
            });
            */
        });
    }
}
