<?php

declare(strict_types=1);

use App\Models\Location;
use App\Models\PetCategory;
use Illuminate\Database\Seeder;

/**
 * @property int $location_Nevermoor
 * @property int $location_Flooded
 * @property int $location_BlackWater
 * @property int $location_Tusk
 * @property int $location_Busted
 * @property int $location_Moldy
 * @property int $location_Split
 * @property int $location_Sunburn
 * @property int $location_Plains
 * @property int $location_Sprawling
 * @property int $location_Stumble
 * @property int $location_BlackForest
 * @property int $location_Magmaron
 * @property int $location_Evernight
 * @property int $location_Maerwynn
 * @property int $location_Skull
 * @property int $location_Northrunt
 * @property int $location_Rotten
 * @property int $location_Erogenion
 * @property int $location_Shadowrock
 * @property int $location_Gnarogrim
 * @property int $location_Gem
 */
abstract class PetSeeder extends Seeder
{

    private ?array $locations = null;
    private ?array $categories = null;


    protected function getLocationId(string $enLocationName): int
    {
        if ($this->locations === null) {
            $this->locations = Location::all()
                ->keyBy(fn(Location $location) => mb_strtolower($location->translate('name', 'en')))->all();
        }

        return $this->locations[mb_strtolower($enLocationName)]->id;
    }


    protected function getCategoryId(string $enCategoryName): int
    {
        if ($this->categories === null) {
            $this->categories = PetCategory::all()
                ->keyBy(fn(PetCategory $petCategory) => $petCategory->translate('name', 'en'))->all();
        }

        return $this->categories[$enCategoryName]->id;
    }


    public function __get($name)
    {
        $locations = [
            'Nevermoor' => 'Nevermoor',
            'Flooded' => 'Flooded Caldwell',
            'BlackWater' => 'Black Water Swamp',
            'Tusk' => 'Tusk Mountain',
            'Busted' => 'Busted Lands',
            'Moldy' => 'Moldy Forest',
            'Split' => 'Split Canyon',
            'Sunburn' => 'Sunburn Desert',
            'Plains' => 'Plains of Oz\'Korr',
            'Sprawling' => 'Sprawling Jungle',
            'Stumble' => 'Stumble Steppe',
            'BlackForest' => 'Black Forest',
            'Magmaron' => 'Magmaron',
            'Evernight' => 'Evernight Forest',
            'Maerwynn' => 'Maerwynn',
            'Skull' => 'Skull Island',
            'Northrunt' => 'Northrunt',
            'Rotten' => 'Rotten Lands',
            'Erogenion' => 'Erogenion',
            'Shadowrock' => 'Shadowrock Mountain',
            'Gnarogrim' => 'Gnarogrim',
            'Gem' => 'Gem mine',
        ];

        $parts = explode('_', $name);

        if ($parts[0] === 'location') {
            return $this->getLocationId($locations[$parts[1]]);
        }

        throw new \Exception('Invalid location name: ' . $parts[1]);
    }
}
