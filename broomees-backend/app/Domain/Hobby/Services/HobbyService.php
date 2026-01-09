<?php

namespace App\Domain\Hobby\Services;

use App\Domain\User\Models\User;
use App\Domain\User\Services\ReputationService;
use Illuminate\Support\Facades\DB;

class HobbyService
{
    public function add(string $userId, string $hobbyId): void
    {
        DB::transaction(function () use ($userId, $hobbyId) {
            $user = User::findOrFail($userId);
            $user->hobbies()->syncWithoutDetaching([$hobbyId]);
            app(ReputationService::class)->recalculate($userId);
        });
    }
}
