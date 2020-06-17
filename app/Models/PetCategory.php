<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class PetCategory
 *
 * @property int $id
 * @property array $name
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PetCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PetCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PetCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PetCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PetCategory whereName($value)
 * @mixin \Eloquent
 */
class PetCategory extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name',
    ];
}
