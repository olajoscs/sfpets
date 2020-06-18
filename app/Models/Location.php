<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Location
 *
 * @property int $id
 * @property string $name
 * @property-read array $translations
 * @method static Builder|Location newModelQuery()
 * @method static Builder|Location newQuery()
 * @method static Builder|Location query()
 * @method static Builder|Location whereId($value)
 * @method static Builder|Location whereName($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name',
    ];
}
