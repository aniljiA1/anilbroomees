<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        RateLimiter::for('read', function (Request $request) {
            return Limit::perMinute(60);
        });

        RateLimiter::for('write', function (Request $request) {
            return Limit::perMinute(30);
        });
    }
}

