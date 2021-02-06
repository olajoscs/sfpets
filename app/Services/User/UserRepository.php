<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User\User;

/**
 * Database handling of the JWT users
 */
interface UserRepository
{
    public const MAX_ACTIVE_AGE = '30 day';

    /**
     * Find the user by its id
     *
     * @param int $id
     *
     * @return User|null
     */
    public function findById(int $id): ?User;


    /**
     * Create and save a new user
     *
     * @return User
     */
    public function create(): User;


    /**
     * Invalidate old users without character
     *
     * @return int
     */
    public function invalidateUsersWithoutCharacter(): int;


    /**
     * Remove the invalidated users
     *
     * @return int Removed user count
     */
    public function removeInvalidatedUsers(): int;
}