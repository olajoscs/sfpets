<?php

declare(strict_types=1);

namespace App\Services\JWT;

use App\Models\JWT\Token;

/**
 * Database handling of the Tokens
 */
interface TokenRepository
{
    public const MAX_ACTIVE_AGE = '30 day';

    /**
     * Return the token by the UUID
     *
     * @param string $uuid
     *
     * @return Token
     */
    public function findByUuid(string $uuid): Token;


    /**
     * Create a new Token
     *
     * @param int    $userId
     * @param string $source
     *
     * @return Token
     */
    public function create(int $userId, string $source): Token;


    /**
     * Mark the Token as seen
     *
     * @param Token $token
     *
     * @return void
     */
    public function markAsSeen(Token $token): void;


    /**
     * Invalidate all the old tokens, which have not been seen for a while
     *
     * @return int Invalidated token count
     */
    public function invalidateOldTokens(): int;
}