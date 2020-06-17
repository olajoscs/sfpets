<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Pet
 *
 * @property int $id
 * @property mixed $name
 * @property int $location_id
 * @property int $category_id
 * @property mixed $description
 * @property mixed $properties
 * @property int $rank
 * @method static Builder|Pet newModelQuery()
 * @method static Builder|Pet newQuery()
 * @method static Builder|Pet query()
 * @method static Builder|Pet whereCategoryId($value)
 * @method static Builder|Pet whereDescription($value)
 * @method static Builder|Pet whereId($value)
 * @method static Builder|Pet whereLocationId($value)
 * @method static Builder|Pet whereName($value)
 * @method static Builder|Pet whereProperties($value)
 * @method static Builder|Pet whereRank($value)
 * @mixin Eloquent
 */
class Pet extends Model
{
    use HasTranslations;

    public array $translatable = [
        'name',
        'description'
    ];
}
