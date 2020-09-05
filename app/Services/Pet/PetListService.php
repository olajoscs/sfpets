<?php

declare(strict_types=1);

namespace App\Services\Pet;

use App\Services\Pet\PetRepository;
use App\Services\Pet\ResponsePetFactory;
use Illuminate\Support\Collection;

/**
 * Common service for pet listing
 */
class PetListService
{
    private PetRepository $petRepository;
    private ResponsePetFactory $responsePetFactory;


    public function __construct(PetRepository $petRepository, ResponsePetFactory $responsePetFactory)
    {
        $this->petRepository = $petRepository;
        $this->responsePetFactory = $responsePetFactory;
    }


    public function getPets(\DateTimeImmutable $date): Collection
    {
        $pets = $this->petRepository->getAll();

        return $this->responsePetFactory->createPets($pets, $date);
    }
}
