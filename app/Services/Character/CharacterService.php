<?php

declare(strict_types=1);

namespace App\Services\Character;

use App\Models\Character\Character;
use App\Models\User\User;

/**
 * Character handling actions
 */
class CharacterService
{
    private CharacterRepository $characterRepository;


    public function __construct(CharacterRepository $characterRepository)
    {
        $this->characterRepository = $characterRepository;
    }


    /**
     * Create a character for the user, with the properties from the array
     *
     * @param User  $user
     * @param array $characterProperties
     *
     * @return Character
     */
    public function create(User $user, array $characterProperties): Character
    {
        $character = $this->characterRepository->create($user->id);
        $character = $this->updateProperties($character, $characterProperties);
        $character->save();

        return $character;
    }


    /**
     * Update the character with the properties from the array
     *
     * @param User  $user
     * @param array $characterProperties
     *
     * @return Character
     */
    public function update(User $user, array $characterProperties): Character
    {
        $character = $this->find($user, $characterProperties['id']);
        assert($character !== null);

        $character = $this->updateProperties($character, $characterProperties);
        $character->save();

        return $character;
    }


    /**
     * Delete the character
     *
     * @param User $user
     * @param int  $characterId
     *
     * @return void
     */
    public function delete(User $user, int $characterId): void
    {
        $character = $this->find($user, $characterId);
        assert($character !== null);

        $character->delete();
    }


    /**
     * Find the character of the user
     *
     * @param User $user
     * @param int  $characterId
     *
     * @return Character|null
     */
    public function find(User $user, int $characterId): ?Character
    {
        $character = $this->characterRepository->find($characterId);

        if ($character === null) {
            return null;
        }

        if ($character->user_id !== $user->id) {
            return null;
        }

        return $character;
    }


    /**
     * Update the properties of the character
     *
     * @param Character $character
     * @param array     $characterProperties
     *
     * @return Character
     */
    private function updateProperties(Character $character, array $characterProperties): Character
    {
        $character->name = $characterProperties['name'];

        return $character;
    }
}