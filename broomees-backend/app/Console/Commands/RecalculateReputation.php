<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Domain\User\Models\User;
use App\Domain\User\Services\ReputationService;

class RecalculateReputation extends Command
{
    protected $signature = 'reputation:recalculate';
    protected $description = 'Recalculate all user reputation scores';

    public function handle()
    {
        User::chunk(100, function ($users) {
            foreach ($users as $user) {
                app(ReputationService::class)->recalculate($user->id);
            }
        });
    }
}
