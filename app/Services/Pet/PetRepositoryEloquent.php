<?php

declare(strict_types=1);

namespace App\Services\Pet;

use App\Models\Pet\Pet;
use App\Services\Pet\PetRepository;
use Illuminate\Support\Collection;

/**
 * Class PetRepositoryEloquent
 *
 * Repository layer of the pets, built with Eloquent
 */
class PetRepositoryEloquent implements PetRepository
{
    public function getAll(): Collection
    {
        return Pet::with(['location', 'category'])->get();
    }
}
