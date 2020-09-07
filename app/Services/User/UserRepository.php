<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User\User;

/**
 * Database handling of the JWT users
 */
interface UserRepository
{
    /**
     * Find the user by its id
     *
     * @param string $uuid
     *
     * @return User|null
     */
    public function findByUuid(string $uuid): ?User;


    /**
     * Create and save a new user
     *
     * @return User
     */
    public function create(): User;
}