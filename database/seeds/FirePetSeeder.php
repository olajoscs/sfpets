<?php

declare(strict_types=1);

class FirePetSeeder extends PetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            [
                'name' => json_encode([
                    'en' => 'Firimp',
                    'hu' => 'Szikrfióka',
                ]),
                'location_id' => $this->location_Nevermoor,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 100,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Gullps',
                    'hu' => 'Nyelke',
                ]),
                'location_id' => $this->location_Flooded,
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel',
                ]),
                'properties' => json_encode([]),
                'rank' => 200,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Pyrophibus',
                    'hu' => 'Pyrophibus',
                ]),
                'location_id' => $this->location_BlackWater,
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel',
                ]),
                'properties' => json_encode([]),
                'rank' => 300,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Flamechirr',
                    'hu' => 'Főnicsiperc',
                ]),
                'location_id' => $this->location_Tusk,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 400,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Tectospit',
                    'hu' => 'Tűzteroid',
                ]),
                'location_id' => $this->location_Busted,
                'description' => json_encode([
                    'en' => 'on Tuesday night',
                    'hu' => 'kedd éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'tuesday',
                ]),
                'rank' => 500,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Pyroplant',
                    'hu' => 'Pyroplant',
                ]),
                'location_id' => $this->location_Moldy,
                'description' => json_encode([
                    'en' => 'on fall nights',
                    'hu' => 'őszi éjszakákon',
                ]),
                'properties' => json_encode([
                    'season' => 'fall',
                ]),
                'rank' => 600,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Kokofire',
                    'hu' => 'Lánkurikú',
                ]),
                'location_id' => $this->location_Split,
                'description' => json_encode([
                    'en' => 'on Monday during the day',
                    'hu' => 'hétfő napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'monday',
                ]),
                'rank' => 700,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Peppryon',
                    'hu' => 'Papripattani',
                ]),
                'location_id' => $this->location_Sunburn,
                'description' => json_encode([
                    'en' => 'on spring days',
                    'hu' => 'tavaszi napokon',
                ]),
                'properties' => json_encode([
                    'season' => 'spring',
                ]),
                'rank' => 800,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Boomywoomy',
                    'hu' => 'Kirobbani',
                ]),
                'location_id' => $this->location_Plains,
                'description' => json_encode([
                    'en' => 'on winter days',
                    'hu' => 'téli napokon',
                ]),
                'properties' => json_encode([
                    'season' => 'winter',
                ]),
                'rank' => 900,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Tikiricky',
                    'hu' => 'Piroticky',
                ]),
                'location_id' => $this->location_Sprawling,
                'description' => json_encode([
                    'en' => 'on Wednesday night',
                    'hu' => 'szerda éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'wednesday',
                ]),
                'rank' => 1000,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Matchlit',
                    'hu' => 'Gyupofa',
                ]),
                'location_id' => $this->location_Stumble,
                'description' => json_encode([
                    'en' => 'on Thursday during the day',
                    'hu' => 'csütörtök napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'thursday',
                ]),
                'rank' => 1100,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Birblazey',
                    'hu' => 'Tűztaréji',
                ]),
                'location_id' => $this->location_BlackForest,
                'description' => json_encode([
                    'en' => 'on summer days',
                    'hu' => 'nyári napokon',
                ]),
                'properties' => json_encode([
                    'season' => 'summer',
                ]),
                'rank' => 1200,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Infernox',
                    'hu' => 'Infernox',
                ]),
                'location_id' => $this->location_Magmaron,
                'description' => json_encode([
                    'en' => 'on Friday during the day',
                    'hu' => 'péntek napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'friday',
                ]),
                'rank' => 1300,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Humbuzzish',
                    'hu' => 'Égezümm',
                ]),
                'location_id' => $this->location_Evernight,
                'description' => json_encode([
                    'en' => 'on Saturday night',
                    'hu' => 'szombat éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'saturday',
                ]),
                'rank' => 1400,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Dragopyr',
                    'hu' => 'Dragopyr',
                ]),
                'location_id' => $this->location_Weapon,
                'description' => json_encode([
                    'en' => 'Can\'t be found in the wild, but in your local weapon shop',
                    'hu' => 'Nem a vadonban találod, hanem a helyi fegyverboltban',
                ]),
                'properties' => json_encode([]),
                'rank' => 1500,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Mantiflame',
                    'hu' => 'Sáskalánga',
                ]),
                'location_id' => $this->location_Maerwynn,
                'description' => json_encode([
                    'en' => 'during Froest Rarities event',
                    'hu' => 'Erdei ritkaságok event alatt',
                ]),
                'properties' => json_encode([
                    'event' => 'forest',
                ]),
                'rank' => 1600,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Finnettle',
                    'hu' => 'Égusznyi',
                ]),
                'location_id' => $this->location_Flooded,
                'description' => json_encode([
                    'en' => 'on Valentine\'s day',
                    'hu' => 'Valentin napon',
                ]),
                'properties' => json_encode([
                    'special' => 'valentine',
                ]),
                'rank' => 1700,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Etrock',
                    'hu' => 'Rakító',
                ]),
                'location_id' => $this->location_Evernight,
                'description' => json_encode([
                    'en' => 'New Year\'s Eve and Day',
                    'hu' => 'Szilveszter, Újév',
                ]),
                'properties' => json_encode([
                    'special' => 'new-year',
                ]),
                'rank' => 1800,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Blazingtongues',
                    'hu' => 'Lángnyelvelőte',
                ]),
                'location_id' => $this->location_Skull,
                'description' => json_encode([
                    'en' => 'Required: Clearing the single-player demon portal',
                    'hu' => 'Feltétel: Démonkapu megtisztítása',
                ]),
                'properties' => json_encode([]),
                'rank' => 1900,
                'category_id' => $this->getCategoryId('fire'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Devastor',
                    'hu' => 'Devastor',
                ]),
                'location_id' => $this->location_Gnarogrim,
                'description' => json_encode([
                    'en' => 'on the last floor of the Fire Habitat',
                    'hu' => 'tűz élőhely utolsó szintjéért',
                ]),
                'properties' => json_encode([]),
                'rank' => 2000,
                'category_id' => $this->getCategoryId('fire'),
            ],
        ]);
    }
}
