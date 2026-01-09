protected $routeMiddleware = [
    // existing ones...
    'auth.token' => \App\Http\Middleware\AuthToken::class,
    'json.only' => \App\Http\Middleware\JsonOnly::class,
];
