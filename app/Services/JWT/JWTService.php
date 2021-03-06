<?php

declare(strict_types=1);

namespace App\Services\JWT;

use App\Exceptions\InvalidTokenCodeException;
use App\Models\JWT\JWTBody;
use App\Models\JWT\Token;
use App\Models\User\User;
use App\Services\User\UserRepository;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use OlajosCs\DateProvider\DateProvider;
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
     * Set the authenticated user from the http request cookie
     *
     * @param Request $request
     *
     * @return void
     */
    public function setUserFromCookie(Request $request): void
    {
        $tokenString = $this->getTokenFrom($request);
        $token = null;

        if ($tokenString !== null) {
            $parsed = $this->decode($tokenString, \Config::get('jwt.secret'));
            $token = $this->tokenRepository->findByUuid($parsed->uuid);
        }

        $this->setUserFromToken($token);
    }


    /**
     * Set the authenticated user from the http request body
     *
     * @param Request $request
     *
     * @return void
     * @throws InvalidTokenCodeException
     */
    public function setUserFromBody(Request $request): void
    {
        $tokenCode = $request->get('token');
        $token = $this->tokenRepository->findByCode($tokenCode);

        if ($token === null) {
            throw new InvalidTokenCodeException('Invalid token code');
        }

        $this->setUserFromToken($token);
        $this->tokenRepository->markCodeAsUsed($token);
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
        $generatedToken = $this->generate($this->JWTAuth->getToken()->uuid);

        return $response->cookie(\Cookie::forever(self::COOKIE_NAME, $generatedToken));
    }


    /**
     * Generate a new token for the user
     *
     * @param User   $user
     * @param string $source
     *
     * @return string Encoded token
     */
    public function generateToken(User $user, string $source): string
    {
        $token = $this->tokenRepository->create($user->id, $source);

        return $token->connection_code;
    }


    /**
     * Set the authenticated user from the token - or create a new one
     *
     * @param Token|null $token
     *
     * @return void
     */
    private function setUserFromToken(?Token $token): void
    {
        if ($token === null) {
            $user = $this->userRepository->create();
            $token = $this->tokenRepository->create($user->id, Token::SOURCE_AUTOMATIC);
        } else {
            $user = $this->userRepository->findById($token->user_id);
            $token = $this->tokenRepository->create($user->id, Token::SOURCE_AUTOMATIC);
        }

        $this->JWTAuth->setUser($user);
        $this->JWTAuth->setToken($token);

        $this->tokenRepository->markAsSeen($token);
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
     * @param string $uuid
     *
     * @return string Encoded token
     */
    private function generate(string $uuid): string
    {
        return $this->encode(new JWTBody($uuid, $this->dateProvider->getNow()), \Config::get('jwt.secret'));
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
