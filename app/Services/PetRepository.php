<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

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
