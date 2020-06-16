<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Location
 *
 *
 */
class Location extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name',
    ];
}
