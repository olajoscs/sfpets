<?php

declare(strict_types=1);

namespace App\Services\Pet;

use Illuminate\Support\Collection;

/**
 * Interface PetRepository
 *
 * Repository layer of the pets
 */
interface PetRepository
{
    /**
     * Return all the pets in the database
     *
     * @return Collection
     */
    public function getAll(): Collection;
}
