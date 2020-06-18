<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class PetCategory
 *
 * @property int $id
 * @property string $name
 * @property-read array $translations
 * @method static Builder|PetCategory newModelQuery()
 * @method static Builder|PetCategory newQuery()
 * @method static Builder|PetCategory query()
 * @method static Builder|PetCategory whereId($value)
 * @method static Builder|PetCategory whereName($value)
 * @mixin \Eloquent
 */
class PetCategory extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name',
    ];
}
