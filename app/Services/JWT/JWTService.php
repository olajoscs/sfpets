<?php

declare(strict_types=1);

namespace App\Services\JWT;

use App\Models\JWT\JWTBody;
use App\Services\DateProvider;
use App\Services\User\UserRepository;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Handle JWT actions
 */
class JWTService
{
    private const ALGO = 'HS256';
    private const COOKIE_NAME = 'token';

    private DateProvider $dateProvider;
    private TokenRepository $tokenRepository;
    private UserRepository $userRepository;
    private JWTAuth $JWTAuth;


    public function __construct(DateProvider $dateProvider, TokenRepository $tokenRepository, UserRepository $userRepository, JWTAuth $JWTAuth)
    {
        $this->dateProvider = $dateProvider;
        $this->tokenRepository = $tokenRepository;
        $this->userRepository = $userRepository;
        $this->JWTAuth = $JWTAuth;
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
     * Set the authenticated user from the http request
     *
     * @param Request $request
     *
     * @return void
     */
    public function setUserFromRequest(Request $request): void
    {
        $token = $this->getTokenFrom($request);

        $user = null;
        if ($token !== null) {
            $parsed = $this->decode($token, \Config::get('jwt.secret'));
            $token = $this->tokenRepository->getByUuid($parsed->uuid);
            $user = $this->userRepository->findById($token->user_id);
        }


        if ($user === null) {
            $user = $this->userRepository->create();
        }

        if ($token === null) {
            $token = $this->tokenRepository->create($user->id);
        }

        $this->tokenRepository->markAsSeen($token);

        $this->JWTAuth->setUser($user);
        $this->JWTAuth->setToken($token);
    }


    /**
     * Set the JWT token in the response header
     *
     * @param Response $response
     *
     * @return Response
     */
    public function setJWTTokenCookie(Response $response): Response
    {
        $generatedToken = $this->generate($this->JWTAuth->getToken()->uuid, \Config::get('jwt.secret'));

        return $response->cookie(\Cookie::forever(self::COOKIE_NAME, $generatedToken));
    }


    /**
     * Decode the given jwt token with the key
     *
     * @param string $jwt
     * @param string $key
     *
     * @return JWTBody The parsed JWT token
     */
    private function decode(string $jwt, string $key): JWTBody
    {
        JWT::$timestamp = $this->dateProvider->getNow()->getTimestamp();
        $decoded = JWT::decode($jwt, $key, [self::ALGO]);

        return JWTBody::createFromStdClass($decoded);
    }


    /**
     * Generate the jwt token for the user
     *
     * @param string $userId
     * @param string $key
     *
     * @return string Encoded token
     */
    private function generate(string $userId, string $key): string
    {
        return $this->encode(new JWTBody($userId, $this->dateProvider->getNow()), $key);
    }


    /**
     * Get the token from the http request
     *
     * @param Request $request
     *
     * @return string|null The encoded token
     */
    private function getTokenFrom(Request $request): ?string
    {
        return $request->cookie(self::COOKIE_NAME);
    }
}
