<?php

namespace App\Http\Controllers;

use App\Models\ApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function token(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'uuid']
        ]);

        $plainToken = Str::random(60);

        ApiToken::create([
            'user_id' => $request->user_id,
            'token_hash' => hash('sha256', $plainToken),
            'expires_at' => now()->addHours(24),
            'revoked' => false,
        ]);

        return response()->json([
            'token' => $plainToken,
            'expires_at' => now()->addHours(24),
        ]);
    }
}
