<?php

declare(strict_types=1);

namespace App\Models\Character;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Character\Character
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Character newModelQuery()
 * @method static Builder|Character newQuery()
 * @method static Builder|Character query()
 * @method static Builder|Character whereCreatedAt($value)
 * @method static Builder|Character whereId($value)
 * @method static Builder|Character whereName($value)
 * @method static Builder|Character whereUpdatedAt($value)
 * @method static Builder|Character whereUserId($value)
 *
 * @mixin \Eloquent
 *
 * @property User $user
 */
class Character extends Model
{
    public $table = 'characters';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id', User::class);
    }
}