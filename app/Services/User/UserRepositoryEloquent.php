<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User\User;
use Illuminate\Support\Str;

/**
 * Eloquent implementation of the UserRepository
 */
class UserRepositoryEloquent implements UserRepository
{
    public function findByUuid(string $uuid): ?User
    {
        return User::where('uuid', $uuid)->first();
    }


    public function create(): User
    {
        $user = new User();

        $user->uuid = Str::uuid()->toString();

        $user->save();

        return $user;
    }
}