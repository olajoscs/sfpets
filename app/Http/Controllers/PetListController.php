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
        $pets = $this->petListService->getPets($this->dateProvider->getToday());

        return \Response::json($pets);
    }
}
