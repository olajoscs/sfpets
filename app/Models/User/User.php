<?php

declare(strict_types=1);

namespace App\Models\User;

use App\Models\Character\Character;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * App\Models\User\User
 *
 * @property int $id
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property Collection|Character[] $characters
 * @property-read int|null $characters_count
 * @method static Builder|\App\Models\User\User whereUuid($value)
 */
class User extends Model
{
    use SoftDeletes;

    protected $table = 'jwt_users';


    public function characters(): HasMany
    {
        return $this
            ->hasMany(Character::class, 'user_id', 'id')
            ->orderBy('created_at', 'asc');
    }
}