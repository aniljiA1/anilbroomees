<?php

namespace App\Domain\User\Policies;

use App\Domain\User\Models\User;

class UserDeletionPolicy
{
    public function canDelete(User $user): bool
    {
        return !$user->relationships()->exists()
            && $user->reputation_score <= config('app.max_reputation_delete', 10);
    }
}
