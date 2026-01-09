<?php

namespace App\Http\Controllers;

use App\Models\User;

class MetricsController extends Controller
{
    public function reputation()
    {
        $users = User::withCount(['relationships', 'hobbies'])->get();

        $data = $users->map(function ($user) {
            return [
                'user_id' => $user->id,
                'reputation' =>
                    ($user->relationships_count * 10) +
                    ($user->hobbies_count * 5)
            ];
        });

        return response()->json($data);
    }
}
