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
        return Character::where('user_id', $userId)->get();
    }


    public function create(int $userId): Character
    {
        return new Character(['user_id' => $userId]);
    }


    public function find(int $id): ?Character
    {
        return Character::find($id);
    }
}
