<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\DateProvider;
use App\Services\PetListService;
use Illuminate\Http\JsonResponse;

class PetListController extends Controller
{
    private PetListService $petListService;
    private DateProvider $dateProvider;


    public function __construct(PetListService $petListService, DateProvider $dateProvider)
    {
        $this->petListService = $petListService;
        $this->dateProvider = $dateProvider;
    }


    public function getList(): JsonResponse
    {
        $petList = $this->petListService->getAvailableList($this->dateProvider->getToday());

        return \Response::json($petList);

        return \Response::json([
            [
                'id' => 1,
                'name' => 'Toothey',
                'canBeFound' => true,
                'description' => 'Description Toothey'
            ],
            [
                'id' => 2,
                'name' => 'Slurp',
                'canBeFound' => false,
                'description' => 'Description Slurp'
            ],
        ]);
    }
}
