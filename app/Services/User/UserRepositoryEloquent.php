<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User\User;

/**
 * Eloquent implementation of the UserRepository
 */
class UserRepositoryEloquent implements UserRepository
{
    public function findById(int $id): ?User
    {
        return User::find($id);
    }


    public function create(): User
    {
        return User::create();
    }
}