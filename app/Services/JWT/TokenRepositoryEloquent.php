<?php

declare(strict_types=1);

namespace App\Services\JWT;

use App\Models\JWT\Token;
use App\Services\DateProvider;
use Illuminate\Support\Str;

/**
 * Eloquent implementation of the Token repository
 */
class TokenRepositoryEloquent implements TokenRepository
{
    private $dateProvider;


    public function __construct(DateProvider $dateProvider)
    {
        $this->dateProvider = $dateProvider;
    }


    public function findByUuid(string $uuid): Token
    {
        $token = Token::find($uuid);

        return $token;
    }


    public function create(int $userId): Token
    {
        $token = new Token();

        $token->uuid = Str::uuid()->toString();
        $token->user_id = $userId;
        $token->created_at = $this->dateProvider->getNow();
        $token->active = true;
        $token->source = Token::SOURCE_AUTOMATIC;

        $token->save();

        return $token;
    }


    public function markAsSeen(Token $token): void
    {
        $token->last_seen = $this->dateProvider->getNow();

        $token->save();
    }
}
