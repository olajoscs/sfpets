<?php

declare(strict_types=1);

namespace App\Services\Character;

use App\Models\Character\Character;
use Illuminate\Support\Collection;

/**
 * Handling db operations of characters
 */
interface CharacterRepository
{
    /**
     * Find all the characters for the user
     *
     * @param int $userId
     *
     * @return Collection
     */
    public function findAllFor(int $userId): Collection;


    /**
     * Create a new character for the user
     *
     * @param int $userId
     *
     * @return Character
     */
    public function create(int $userId): Character;


    /**
     * Find the character with the ID
     *
     * @param int $id
     *
     * @return Character|null
     */
    public function find(int $id): ?Character;
}