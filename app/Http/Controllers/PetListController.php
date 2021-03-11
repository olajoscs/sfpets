<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Character\Character;
use App\Services\Character\CharacterPetService;
use App\Services\Character\CharacterService;
use App\Services\JWT\JWTAuth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OlajosCs\DateProvider\DateProvider;

class PetListController extends Controller
{
    private DateProvider $dateProvider;
    private JWTAuth $JWTAuth;
    private CharacterService $characterService;
    private CharacterPetService $characterPetService;


    public function __construct(
        DateProvider $dateProvider,
        JWTAuth $JWTAuth,
        CharacterService $characterService,
        CharacterPetService $characterPetService
    )
    {
        $this->dateProvider = $dateProvider;
        $this->characterPetService = $characterPetService;
        $this->JWTAuth = $JWTAuth;
        $this->characterService = $characterService;
    }


    /**
     * Return the ResponsePet list according to the character progress
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getList(Request $request): JsonResponse
    {
        $character = $this->getCharacter($request);

        if ($character === null) {
            return \Response::json([]);
        }

        $pets = $this->characterPetService->getPets($character, $this->dateProvider->getToday());

        return \Response::json($pets);
    }


    public function markDiscovered(Request $request): JsonResponse
    {
        $character = $this->getCharacter($request);

        if ($character === null) {
            return \Response::json([]);
        }

        $petId = (int)$request->get('petId');
        $isDiscovered = (bool)$request->get('status');

        $this->characterPetService->markDiscovered($character->id, $petId, $isDiscovered);

        return \Response::json(['status' => 'ok']);
    }


    public function markFound(Request $request): JsonResponse
    {
        $character = $this->getCharacter($request);

        if ($character === null) {
            return \Response::json([]);
        }

        $petId = (int)$request->get('petId');
        $isFound = (bool)$request->get('status');

        $this->characterPetService->markFound($character->id, $petId, $isFound);

        return \Response::json(['status' => 'ok']);
    }


    private function getCharacter(Request $request): ?Character
    {
        $characterId = (int)$request->get('characterId');
        $user = $this->JWTAuth->getUser();

        return $this->characterService->find($user, $characterId);
    }
}
