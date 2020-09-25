<?php

declare(strict_types=1);

namespace App\Services\Character;

use App\Models\Character\Character;
use Illuminate\Support\Collection;

/**
 * Eloquent implementation of the CharacterRepository
 */
class CharacterRepositoryEloquent implements CharacterRepository
{
    public function findAllFor(int $userId): Collection
    {
        return Character::where('user_id', $userId)->orderBy('created_at', 'asc')->get();
    }


    public function create(int $userId): Character
    {
        $character = new Character();

        $character->user_id = $userId;

        return $character;
    }


    public function find(int $id): ?Character
    {
        return Character::find($id);
    }
}
