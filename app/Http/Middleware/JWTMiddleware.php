<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\JWT\JWTAuth;
use App\Services\JWT\JWTService;
use App\Services\User\UserRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * JWT token handling middleware
 */
class JWTMiddleware
{
    private JWTService $JWTService;
    private JWTAuth $JWTAuth;
    private UserRepository $userRepository;


    public function __construct(JWTService $JWTService, JWTAuth $JWTAuth, UserRepository $userRepository)
    {
        $this->JWTService = $JWTService;
        $this->JWTAuth = $JWTAuth;
        $this->userRepository = $userRepository;
    }


    public function handle(Request $request, \Closure $next)
    {
        $this->setUserFromRequest($request);

        /** @var Response $response */
        $response = $next($request);

        return $this->setJWTTokenCookie($response);
    }


    private function setUserFromRequest(Request $request): void
    {
        $token = $this->JWTService->getTokenFrom($request);

        $user = null;
        if ($token !== null) {
            $parsed = $this->JWTService->decode($token, \Config::get('jwt.secret'));
            $user = $this->userRepository->findById($parsed->uuid);
        }

        if ($user === null) {
            $user = $this->userRepository->create();
        }

        $this->JWTAuth->setUser($user);
    }


    private function setJWTTokenCookie(Response $response): Response
    {
        $generatedToken = $this->JWTService->generate($this->JWTAuth->getUser()->id, \Config::get('jwt.secret'));

        return $response->cookie(\Cookie::forever(JWTService::COOKIE_NAME, $generatedToken));
    }
}