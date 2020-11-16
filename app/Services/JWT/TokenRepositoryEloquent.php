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
        return Token::where('active', true)->find($uuid);
    }


    public function create(int $userId, string $source): Token
    {
        $token = new Token();

        $token->uuid = Str::uuid()->toString();
        $token->user_id = $userId;
        $token->created_at = $this->dateProvider->getNow();
        $token->active = true;
        $token->source = $source;

        if ($source === Token::SOURCE_USER) {
            $token->connection_code = (string)random_int(100000, 999999);
        }

        $token->save();

        return $token;
    }


    public function markAsSeen(Token $token): void
    {
        $token->last_seen = $this->dateProvider->getNow();

        $token->save();
    }


    public function invalidateOldTokens(): int
    {
        return Token::where(
            'last_seen',
            '<',
            $this->dateProvider->getToday()->modify('-' . self::MAX_ACTIVE_AGE)
        )
            ->update([
                'active' => false,
            ]);
    }


    public function findByCode(string $tokenCode): ?Token
    {
        return Token::where('connection_code', '=', $tokenCode)
            ->where('connection_code_used', '=', false)
            ->first();
    }


    public function markCodeAsUsed(Token $token): void
    {
        $token->connection_code_used = true;
        $token->save();
    }
}
