<?php

declare(strict_types=1);

namespace App\Services\JWT;

use App\Models\JWT\Token;

/**
 * Database handling of the Tokens
 */
interface TokenRepository
{
    /**
     * Return the token by the UUID
     *
     * @param string $uuid
     *
     * @return Token
     */
    public function getByUuid(string $uuid): Token;


    /**
     * Create a new Token
     *
     * @param int $userId
     *
     * @return Token
     */
    public function create(int $userId): Token;


    /**
     * Mark the Token as seen
     *
     * @param Token $token
     *
     * @return void
     */
    public function markAsSeen(Token $token): void;
}