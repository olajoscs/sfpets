<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Location
 *
 * @property int $id
 * @property array $name
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereName($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name',
    ];
}
