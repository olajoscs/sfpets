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
    /**
     * @var CharacterRepository
     */
    private $characterRepository;


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
        $character = $this->characterRepository->find($characterProperties['id']);
        assert($user->id === $character->user_id);

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
        $character = $this->characterRepository->find($characterId);
        assert($user->id === $character->user_id);

        $character->delete();
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