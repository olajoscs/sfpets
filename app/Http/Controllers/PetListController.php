<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PetListController extends Controller
{
    public function getList(): JsonResponse
    {
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
