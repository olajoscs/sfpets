<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Collection;

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
