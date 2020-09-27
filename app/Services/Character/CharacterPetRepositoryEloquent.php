<?php

declare(strict_types=1);

namespace App\Services\Character;

/**
 * Eloquent implementation of the found/discovered pets DB layer
 */
class CharacterPetRepositoryEloquent implements CharacterPetRepository
{
    public function getDiscoveredPetIds(int $characterId): array
    {
        return \DB::connection()
            ->table('character_pet_discovered')
            ->where('character_id', '=', $characterId)
            ->get('pet_id')
            ->pluck('pet_id')
            ->toArray();
    }


    public function getFoundPetIds(int $characterId): array
    {
        return \DB::connection()
            ->table('character_pet_found')
            ->where('character_id', '=', $characterId)
            ->get('pet_id')
            ->pluck('pet_id')
            ->toArray();
    }
}