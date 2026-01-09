<?php

namespace App\Domain\Relationship\Services;

use App\Domain\Relationship\Models\Relationship;
use App\Domain\User\Services\ReputationService;
use Illuminate\Support\Facades\DB;

class RelationshipService
{
    public function create(string $userId, string $friendId): void
    {
        if ($userId === $friendId) abort(400);

        DB::transaction(function () use ($userId, $friendId) {
            Relationship::insertOrIgnore([
                ['user_id' => $userId, 'friend_id' => $friendId],
                ['user_id' => $friendId, 'friend_id' => $userId],
            ]);

            app(ReputationService::class)->recalculate($userId);
            app(ReputationService::class)->recalculate($friendId);
        });
    }
}
