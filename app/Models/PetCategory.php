<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class PetCategory
 *
 *
 */
class PetCategory extends Model
{
    use HasTranslations;

    public $translatable = [
        'name',
    ];
}
