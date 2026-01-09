use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

public function boot(): void
{
    $this->configureRateLimiting();
    $this->routes(function () {
        // your routes...
    });
}

protected function configureRateLimiting(): void
{
    // Read limiter
    RateLimiter::for('read', function ($request) {
        return Limit::perMinute(60)
            ->by($request->user()?->id ?: $request->ip());
    });

    // Write limiter
    RateLimiter::for('write', function ($request) {
        return Limit::perMinute(30)
            ->by($request->user()?->id ?: $request->ip());
    });

    // Default API limiter
    RateLimiter::for('api', function ($request) {
        return Limit::perMinute(60)
            ->by($request->user()?->id ?: $request->ip());
    });
}
