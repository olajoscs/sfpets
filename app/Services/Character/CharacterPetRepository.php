<?php

declare(strict_types=1);

namespace App\Services\Character;

/**
 * DB layer for found/discovered pets
 */
interface CharacterPetRepository
{
    /**
     * Return the discovered pet ids for the character
     *
     * @param int $characterId
     *
     * @return int[]
     */
    public function getDiscoveredPetIds(int $characterId): array;


    /**
     * Return the found pet ids for the character
     *
     * @param int $characterId
     *
     * @return int[]
     */
    public function getFoundPetIds(int $characterId): array;
}