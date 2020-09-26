<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Character\Character;
use App\Services\Character\CharacterService;
use App\Services\JWT\JWTAuth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Character endpoints handling
 */
class CharacterController extends Controller
{
    private $JWTAuth;
    private $characterService;


    public function __construct(JWTAuth $JWTAuth, CharacterService $characterService)
    {
        $this->JWTAuth = $JWTAuth;
        $this->characterService = $characterService;
    }


    /**
     * Return all the characters for the currently authenticated user
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $user = $this->JWTAuth->getUser();

        return \Response::json($user->characters);
    }


    /**
     * Create a new character for the currently authenticated user
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $user = $this->JWTAuth->getUser();

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'min:3']
        ]);

        $character = $this->characterService->create($user, $validated);

        return \Response::json($character);
    }


    public function delete(Request $request): JsonResponse
    {
        $user = $this->JWTAuth->getUser();
        $request->validate([
            'id' => ['required', 'min:0', 'exists:' . Character::class . ',id'],
        ]);

        $characterId = (int)$request->get('id');

        $this->characterService->delete($user, $characterId);

        return \Response::json(null);
    }
}
