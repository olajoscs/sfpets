<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\JWT\JWTService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * JWT token handling middleware
 */
class JWTMiddleware
{
    private JWTService $JWTService;


    public function __construct(JWTService $JWTService)
    {
        $this->JWTService = $JWTService;
    }


    public function handle(Request $request, \Closure $next)
    {
        $this->JWTService->setUserFromCookie($request);

        /** @var Response $response */
        $response = $next($request);

        return $this->JWTService->setJWTTokenCookie($response);
    }
}