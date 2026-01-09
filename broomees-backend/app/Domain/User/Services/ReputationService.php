<?php

namespace App\Domain\User\Services;

use App\Domain\User\Models\User;
use App\Domain\Relationship\Models\Relationship;
use Illuminate\Support\Facades\DB;

class ReputationService
{
    public function recalculate(string $userId): void
    {
        DB::transaction(function () use ($userId) {
            $user = User::findOrFail($userId);

            $friends = Relationship::where('user_id', $userId)->count();
            $hobbies = DB::table('hobby_user')->where('user_id', $userId)->count();
            $ageScore = min(3, now()->diffInDays($user->created_at) / 30);

            $score = $friends + ($hobbies * 0.5) + $ageScore;

            $user->update(['reputation_score' => $score]);
        });
    }
}
