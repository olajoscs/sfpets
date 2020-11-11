<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\JWT\JWTAuth;
use App\Services\JWT\JWTService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Handling Token-related actions
 */
class TokenController extends Controller
{
    private JWTAuth $JWTAuth;
    private JWTService $JWTService;


    public function __construct(JWTAuth $JWTAuth, JWTService $JWTService)
    {
        $this->JWTAuth = $JWTAuth;
        $this->JWTService = $JWTService;
    }


    /**
     * Generate a new token for the authenticated user
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function generate(Request $request): JsonResponse
    {
        $user = $this->JWTAuth->getUser();

        $token = $this->JWTService->generateToken($user);

        return response()->json([
            'status' => 'ok',
            'token' => $token
        ]);
    }


    /**
     * Apply a token in the cookie
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function apply(Request $request): JsonResponse
    {
        $this->JWTService->setUserFromBody($request);

        return response()->json([
            'status' => 'ok'
        ]);
    }
}