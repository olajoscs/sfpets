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
    public function findById(string $id): ?User
    {
        return User::find($id);
    }


    public function create(): User
    {
        $user = new User();

        $user->id = Str::uuid()->toString();

        $user->save();

        return $user;
    }
}