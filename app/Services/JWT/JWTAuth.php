<?php

declare(strict_types=1);

namespace App\Services\JWT;

use App\Exceptions\MultipleUserSetException;
use App\Models\User\User;

/**
 * Authentication based on JWT token
 */
class JWTAuth
{
    private ?User $user = null;


    /**
     * Return the currently authenticated user
     *
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }


    /**
     * Set the authenticated user.
     *
     * @param User $user
     *
     * @return void
     * @throws MultipleUserSetException When the user is already set
     */
    public function setUser(User $user): void
    {
        if ($this->user !== null) {
            throw new MultipleUserSetException('User already set: ' . $this->user->id);
        }

        $this->user = $user;
    }
}