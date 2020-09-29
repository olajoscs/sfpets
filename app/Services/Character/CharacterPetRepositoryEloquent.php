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


    public function markDiscovered(int $characterId, int $petId, bool $isDiscovered): void
    {
        if ($isDiscovered) {
            $this->setDiscovered($characterId, $petId);
        } else {
            $this->setNotDiscovered($characterId, $petId);
        }
    }


    public function markFound(int $characterId, int $petId, bool $isFound): void
    {
        if ($isFound) {
            $this->setFound($characterId, $petId);
        } else {
            $this->setNotFound($characterId, $petId);
        }
    }


    private function setDiscovered(int $characterId, int $petId): void
    {
        \DB::connection()
            ->table('character_pet_discovered')
            ->updateOrInsert([
                'character_id' => $characterId,
                'pet_id' => $petId,
            ]);
    }


    private function setNotDiscovered(int $characterId, int $petId): void
    {
        \DB::connection()
            ->table('character_pet_discovered')
            ->where('character_id', '=', $characterId)
            ->where('pet_id', '=', $petId)
            ->delete();
    }


    private function setFound(int $characterId, int $petId): void
    {
        \DB::connection()
            ->table('character_pet_found')
            ->updateOrInsert([
                'character_id' => $characterId,
                'pet_id' => $petId,
            ]);
    }


    private function setNotFound(int $characterId, int $petId): void
    {
        \DB::connection()
            ->table('character_pet_found')
            ->where('character_id', '=', $characterId)
            ->where('pet_id', '=', $petId)
            ->delete();
    }
}