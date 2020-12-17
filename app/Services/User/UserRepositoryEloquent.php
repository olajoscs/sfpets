<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\User\User;
use App\Services\DateProvider;

/**
 * Eloquent implementation of the UserRepository
 */
class UserRepositoryEloquent implements UserRepository
{
    private DateProvider $dateProvider;


    public function __construct(DateProvider $dateProvider)
    {
        $this->dateProvider = $dateProvider;
    }


    public function findById(int $id): ?User
    {
        return User::find($id);
    }


    public function create(): User
    {
        return User::create();
    }


    public function invalidateUsersWithoutCharacter(): int
    {
        $userIds = \DB::table('jwt_users')
            ->leftJoin('characters', 'jwt_users.id', '=', 'characters.user_id')
            ->whereNull('characters.id')
            ->whereNull('jwt_users.deleted_at')
            ->where('jwt_users.created_at', '<', $this->dateProvider->getToday()->modify('-' . self::MAX_ACTIVE_AGE))
            ->get('jwt_users.id')
            ->pluck('id')
            ->toArray();


        User::whereIn('id', $userIds)->delete();

        return count($userIds);
    }
}