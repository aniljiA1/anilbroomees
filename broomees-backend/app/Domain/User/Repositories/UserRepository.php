<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;

class UserRepository
{
    public function paginate(int $perPage = 10)
    {
        return User::paginate($perPage);
    }

    public function find(string $id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }
}
