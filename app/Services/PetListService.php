<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pet;
use Illuminate\Support\Collection;

/**
 * Class PetListService
 *
 * Common service for pet listing
 */
class PetListService
{
    private PetRepository $petRepository;
    private PetAvailabilityChecker $petAvailabilityChecker;


    public function __construct(PetRepository $petRepository, PetAvailabilityChecker $petAvailabilityChecker)
    {
        $this->petRepository = $petRepository;
        $this->petAvailabilityChecker = $petAvailabilityChecker;
    }


    public function getAvailableList(\DateTimeImmutable $date): Collection
    {
        $petList = $this->petRepository->getAll();
        $filteredPetList = $petList->filter(fn(Pet $pet) => $this->petAvailabilityChecker->isAvailableAt($pet, $date));

        return $filteredPetList;
    }
}
