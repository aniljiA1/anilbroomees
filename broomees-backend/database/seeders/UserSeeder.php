<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\User\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => Str::uuid(),
            'username' => 'anil',
            'age' => 30,
            'reputationScore' => 0,
            'version' => 1,
        ]);
    }
}
