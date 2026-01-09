<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

class RateLimitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        RateLimiter::for('read', fn ($req) =>
            Limit::perMinute(120)->by($req->bearerToken())
        );

        RateLimiter::for('write', fn ($req) =>
            Limit::perMinute(30)->by($req->bearerToken())
        );
    }
}
