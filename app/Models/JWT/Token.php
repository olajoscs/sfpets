<?php

declare(strict_types=1);

namespace App\Models\JWT;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\JWT\Token
 *
 * @property string $uuid
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $last_seen
 * @property bool $active
 * @property string $source
 * @property string $connection_code
 * @property bool $connection_code_used
 *
 * @method static Builder|Token newModelQuery()
 * @method static Builder|Token newQuery()
 * @method static Builder|Token query()
 * @method static Builder|Token whereCreatedAt($value)
 * @method static Builder|Token whereUuid($value)
 * @method static Builder|Token whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Token extends \Eloquent
{
    public const SOURCE_AUTOMATIC = 'automatic';
    public const SOURCE_USER = 'user';
    public const SOURCE_MIGRATION = 'migration';

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'jwt_tokens';
    protected $casts = [
        'created_at' => 'datetime',
        'last_seen' => 'datetime',
    ];
    public $timestamps = false;
}