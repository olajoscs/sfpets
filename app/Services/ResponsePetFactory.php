<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pet;
use App\Models\ResponsePet;
use Illuminate\Support\Collection;

/**
 * Class ResponsePetFactory
 *
 * Creates ResponsePet objects, which contains the necessary information for the API response
 */
class ResponsePetFactory
{
    private PetAvailabilityChecker $petAvailabilityChecker;


    public function __construct(PetAvailabilityChecker $petAvailabilityChecker)
    {
        $this->petAvailabilityChecker = $petAvailabilityChecker;
    }


    /**
     * Create ResponsePet objects, which contains the necessary information for the API response
     *
     * @param Collection|Pet[]   $pets
     * @param \DateTimeImmutable $date
     *
     * @return Collection|Pet[]
     */
    public function createPets(Collection $pets, \DateTimeImmutable $date): Collection
    {
        return $pets->map(fn (Pet $pet) => $this->createResponsePet($pet, $date));
    }


    private function createResponsePet(Pet $pet, \DateTimeImmutable $date): ResponsePet
    {
        $responsePet = new ResponsePet();

        $responsePet->id = $pet->id;
        $responsePet->name = $pet->name;
        $responsePet->description = $pet->description;
        $responsePet->location = $pet->location->name;
        $responsePet->category = $pet->category->name;
        $responsePet->available = $this->petAvailabilityChecker->isAvailableAt($pet, $date);
        $responsePet->rank = $pet->rank;
        $responsePet->categoryId = $pet->category->id;

        return $responsePet;
    }
}
