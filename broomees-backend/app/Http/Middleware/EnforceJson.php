<?php

namespace App\Http\Middleware;

use Closure;

class EnforceJson
{
    public function handle($request, Closure $next)
    {
        if (!$request->isJson()) {
            return response()->json([
                'error' => 'Content-Type must be application/json'
            ], 400);
        }

        return $next($request);
    }
}
