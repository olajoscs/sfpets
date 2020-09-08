<?php

declare(strict_types=1);

namespace App\Services\JWT;

use App\Models\JWT\JWTBody;
use App\Services\DateProvider;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

/**
 * Handle JWT actions
 */
class JWTService
{
    private const ALGO = 'HS256';
    public const COOKIE_NAME = 'token';

    private DateProvider $dateProvider;


    public function __construct(DateProvider $dateProvider)
    {
        $this->dateProvider = $dateProvider;
    }


    /**
     * Encode the given body with the key
     *
     * @param JWTBody $body
     * @param string  $key
     *
     * @return string The encoded token
     */
    public function encode(JWTBody $body, string $key): string
    {
        JWT::$timestamp = $this->dateProvider->getNow()->getTimestamp();

        return JWT::encode($body, $key, self::ALGO);
    }


    /**
     * Decode the given jwt token with the key
     *
     * @param string $jwt
     * @param string $key
     *
     * @return JWTBody The parsed JWT token
     */
    public function decode(string $jwt, string $key): JWTBody
    {
        JWT::$timestamp = $this->dateProvider->getNow()->getTimestamp();
        $decoded = JWT::decode($jwt, $key, [self::ALGO]);

        return JWTBody::createFromStdClass($decoded);
    }


    /**
     * Get the token from the http request
     *
     * @param Request $request
     *
     * @return string|null The encoded token
     */
    public function getTokenFrom(Request $request): ?string
    {
        return $request->cookie(self::COOKIE_NAME);
    }


    /**
     * Generate the jwt token for the user
     *
     * @param string $userId
     * @param string $key
     *
     * @return string Encoded token
     */
    public function generate(string $userId, string $key): string
    {
        return $this->encode(new JWTBody($userId, $this->dateProvider->getNow()), $key);
    }
}
