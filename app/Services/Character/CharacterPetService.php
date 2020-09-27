<?php

declare(strict_types=1);

namespace App\Services\Character;

use App\Models\Character\Character;
use App\Models\Pet\ResponsePet;
use App\Services\Pet\PetListService;
use Illuminate\Support\Collection;

/**
 * Handling pets based on character progress
 */
class CharacterPetService
{
    private PetListService $petListService;
    private CharacterPetRepository $characterPetRepository;


    public function __construct(PetListService $petListService, CharacterPetRepository $characterPetRepository)
    {
        $this->petListService = $petListService;
        $this->characterPetRepository = $characterPetRepository;
    }


    /**
     * Return the ResponsePet list according to the character progress
     *
     * @param Character          $character
     * @param \DateTimeImmutable $date
     *
     * @return Collection
     */
    public function getPets(Character $character, \DateTimeImmutable $date): Collection
    {
        $pets = $this->petListService->getPets($date);

        return $this->setPetProgressProperties($character, $pets);
    }


    /**
     * Set the ResponsePet propeties according to the character progress
     *
     * @param Character  $character
     * @param Collection $pets
     *
     * @return Collection
     */
    private function setPetProgressProperties(Character $character, Collection $pets): Collection
    {
        $discoveredPetIds = $this->characterPetRepository->getDiscoveredPetIds($character->id);
        $foundPetIds = $this->characterPetRepository->getFoundPetIds($character->id);

        return $pets->map(function (ResponsePet $pet) use ($discoveredPetIds, $foundPetIds) {
            if (in_array($pet->id, $discoveredPetIds, true)) {
                $pet->isDiscovered = true;
            }

            if (in_array($pet->id, $foundPetIds, true)) {
                $pet->isFound = true;
            }

            return $pet;
        });
    }
}