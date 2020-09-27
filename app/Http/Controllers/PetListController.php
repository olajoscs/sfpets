<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Character\CharacterPetService;
use App\Services\Character\CharacterService;
use App\Services\DateProvider;
use App\Services\JWT\JWTAuth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PetListController extends Controller
{
    private DateProvider $dateProvider;
    private JWTAuth $JWTAuth;
    private CharacterService $characterService;
    private CharacterPetService $characterPetService;


    public function __construct(DateProvider $dateProvider, JWTAuth $JWTAuth, CharacterService $characterService, CharacterPetService $characterPetService)
    {
        $this->dateProvider = $dateProvider;
        $this->characterPetService = $characterPetService;
        $this->JWTAuth = $JWTAuth;
        $this->characterService = $characterService;
    }


    /**
     * Return the ResponsePet list according to the character progress
     *
     * @return JsonResponse
     */
    public function getList(Request $request): JsonResponse
    {
        $characterId = (int)$request->get('characterId');
        $user = $this->JWTAuth->getUser();

        $character = $this->characterService->find($user, $characterId);

        if ($character === null) {
            return \Response::json([]);
        }

        $pets = $this->characterPetService->getPets($character, $this->dateProvider->getToday());

        return \Response::json($pets);
    }
}
