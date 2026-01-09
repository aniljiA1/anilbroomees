<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json([
                'error' => 'Authorization token missing'
            ], 401);
        }

        $token = str_replace('Bearer ', '', $authHeader);

        if ($token !== config('app.api_token')) {
            return response()->json([
                'error' => 'Invalid token'
            ], 403);
        }

        return $next($request);
    }
}
