<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

/**
 * Class PetListService
 *
 * Common service for pet listing
 */
class PetListService
{
    private PetRepository $petRepository;
    private ResponsePetFactory $petDecorator;


    public function __construct(PetRepository $petRepository, ResponsePetFactory $petDecorator)
    {
        $this->petRepository = $petRepository;
        $this->petDecorator = $petDecorator;
    }


    public function getPets(\DateTimeImmutable $date): Collection
    {
        $pets = $this->petRepository->getAll();

        return $this->petDecorator->createPets($pets, $date);
    }
}
