namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateWithToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        // TEMP: allow a fixed test token
        if (!$token || $token !== 'test_token_123') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
