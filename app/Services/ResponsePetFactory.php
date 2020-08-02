<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pet;
use App\Models\ResponsePet;
use Illuminate\Support\Collection;

/**
 * Creates ResponsePet objects, which contains the necessary information for the API response
 */
class ResponsePetFactory
{
    private PetAvailabilityChecker $petAvailabilityChecker;
    private PetImageProvider $petImageProvider;


    public function __construct(PetAvailabilityChecker $petAvailabilityChecker, PetImageProvider $petImageProvider)
    {
        $this->petAvailabilityChecker = $petAvailabilityChecker;
        $this->petImageProvider = $petImageProvider;
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
        $responsePet->image = $this->petImageProvider->getImageFullPath($pet);

        return $responsePet;
    }
}
