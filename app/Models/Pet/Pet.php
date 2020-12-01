<?php

declare(strict_types=1);

namespace App\Models\Pet;

use App\Models\Pet\Location;
use App\Models\Pet\PetCategory;
use App\Models\Pet\PetProperties;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property string $image
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
 * @property-read array       $translations
 * @property-read PetCategory $category
 * @property-read Location    $location
 * @method static Builder|Pet whereImage($value)
 */
class Pet extends Model
{
    use HasTranslations;

    public $timestamps = false;

    public array $translatable = [
        'name',
        'description'
    ];


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id', 'id', Location::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(PetCategory::class, 'category_id', 'id', PetCategory::class);
    }


    public function getProperties(): PetProperties
    {
        return new PetProperties((object)json_decode($this->properties));
    }
}
