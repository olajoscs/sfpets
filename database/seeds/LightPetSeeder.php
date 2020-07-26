<?php

declare(strict_types=1);

class LightPetSeeder extends PetSeeder
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
                'name' => json_encode(
                    [
                        'hu' => 'Pónek',
                        'en' => 'Shaggyll',
                    ]
                ),
                'location_id' => $this->location_Stumble,
                'description' => json_encode(
                    [
                        'en' => 'during the day',
                        'hu' => 'nappal',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 100,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Medklopsz',
                        'en' => 'Jellclops',
                    ]
                ),
                'location_id' => $this->location_Moldy,
                'description' => json_encode(
                    [
                        'en' => 'at night',
                        'hu' => 'éjjel',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 200,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Csangaleng',
                        'en' => 'Tinck',
                    ]
                ),
                'location_id' => $this->location_Erogenion,
                'description' => json_encode(
                    [
                        'en' => 'during the day',
                        'hu' => 'nappal',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 300,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Fellám',
                        'en' => 'Cloudning',
                    ]
                ),
                'location_id' => $this->location_Shadowrock,
                'description' => json_encode(
                    [
                        'en' => 'during the day',
                        'hu' => 'nappal',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 400,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Kukkacc',
                        'en' => 'Nevorfull',
                    ]
                ),
                'location_id' => $this->location_Sprawling,
                'description' => json_encode(
                    [
                        'en' => 'on spring nights',
                        'hu' => 'tavaszi éjszakákon',
                    ]
                ),
                'properties' => json_encode([
                    'season' => 'spring',
                ]),
                'rank' => 500,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Plutoid',
                        'en' => 'Plutoid',
                    ]
                ),
                'location_id' => $this->location_Nevermoor,
                'description' => json_encode(
                    [
                        'en' => 'on Saturday during the day',
                        'hu' => 'szombaton',
                    ]
                ),
                'properties' => json_encode([
                    'day' => 'saturday',
                ]),
                'rank' => 600,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Djinntonic',
                        'en' => 'Djinntonic',
                    ]
                ),
                'location_id' => $this->location_Sunburn,
                'description' => json_encode(
                    [
                        'en' => 'on summer days',
                        'hu' => 'nyári napokon',
                    ]
                ),
                'properties' => json_encode([
                    'season' => 'summer',
                ]),
                'rank' => 700,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Blaxta',
                        'en' => 'Blaxta',
                    ]
                ),
                'location_id' => $this->location_Flooded,
                'description' => json_encode(
                    [
                        'en' => 'on fall days',
                        'hu' => 'őszi napokon',
                    ]
                ),
                'properties' => json_encode([
                    'season' => 'fall',
                ]),
                'rank' => 800,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Dzsinneri',
                        'en' => 'Lampcess',
                    ]
                ),
                'location_id' => $this->location_Skull,
                'description' => json_encode(
                    [
                        'en' => 'on Monday night',
                        'hu' => 'hétfő éjjel',
                    ]
                ),
                'properties' => json_encode([
                    'day' => 'monday',
                ]),
                'rank' => 900,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Sziklag',
                        'en' => 'Teslarr',
                    ]
                ),
                'location_id' => $this->location_Busted,
                'description' => json_encode(
                    [
                        'en' => 'on Tuesday during the day',
                        'hu' => 'kedden nappal',
                    ]
                ),
                'properties' => json_encode([
                    'day' => 'tuesday',
                ]),
                'rank' => 1000,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Sütter',
                        'en' => 'Sunnya',
                    ]
                ),
                'location_id' => $this->location_Tusk,
                'description' => json_encode(
                    [
                        'en' => 'on Sunday during the day',
                        'hu' => 'vasárnap nappal',
                    ]
                ),
                'properties' => json_encode([
                    'day' => 'saturday',
                ]),
                'rank' => 1100,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Kecska',
                        'en' => 'Buckfoxion',
                    ]
                ),
                'location_id' => $this->location_Northrunt,
                'description' => json_encode(
                    [
                        'en' => 'on Wednesday night',
                        'hu' => 'szerda éjjel',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 1200,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Csirpili',
                        'en' => 'Birdychirp',
                    ]
                ),
                'location_id' => $this->location_Evernight,
                'description' => json_encode(
                    [
                        'en' => 'on Thursday during the day',
                        'hu' => 'csütörtök nappal',
                    ]
                ),
                'properties' => json_encode([
                    'day' => 'thursday',
                ]),
                'rank' => 1300,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Szemenszede',
                        'en' => 'Eyeorwhat',
                    ]
                ),
                'location_id' => $this->location_BlackWater,
                'description' => json_encode(
                    [
                        'en' => 'on Friday during the day',
                        'hu' => 'pénteken nappal',
                    ]
                ),
                'properties' => json_encode([
                    'day' => 'friday',
                ]),
                'rank' => 1400,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Bűvkekorr',
                        'en' => 'Mesmerit',
                    ]
                ),
                'location_id' => $this->location_Erogenion,
                'description' => json_encode(
                    [
                        'en' => 'Guild hall of fame top 1000 or 2.500 honor',
                        'hu' => 'Céh Top 100 vagy 2500 becsület',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 1500,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Aggoncs',
                        'en' => 'Antlar',
                    ]
                ),
                'location_id' => $this->location_Northrunt,
                'description' => json_encode(
                    [
                        'en' => 'in December',
                        'hu' => 'Decemberben',
                    ]
                ),
                'properties' => json_encode([
                    'month' => 'december',
                ]),
                'rank' => 1600,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Dömpfánt',
                        'en' => 'Liphant',
                    ]
                ),
                'location_id' => $this->location_Split,
                'description' => json_encode(
                    [
                        'en' => 'on April\'s fool day',
                        'hu' => 'Április elseje',
                    ]
                ),
                'properties' => json_encode([
                    'date' => [
                        'month' => 4,
                        'day' => 1,
                    ],
                ]),
                'rank' => 1700,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Fénylovi',
                        'en' => 'Knilight',
                    ]
                ),
                'location_id' => $this->location_Erogenion,
                'description' => json_encode(
                    [
                        'en' => 'during Epic event',
                        'hu' => 'Epikus event',
                    ]
                ),
                'properties' => json_encode([
                    'event' => 'epic',
                ]),
                'rank' => 1800,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Heraldon',
                        'en' => 'Heraldon',
                    ]
                ),
                'location_id' => $this->location_Rotten,
                'description' => json_encode(
                    [
                        'en' => 'After cleaning the tower',
                        'hu' => 'Torony megtisztítása',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 1900,
                'category_id' => $this->getCategoryId('light'),
            ],
            [
                'name' => json_encode(
                    [
                        'hu' => 'Unikor',
                        'en' => 'Unikor',
                    ]
                ),
                'location_id' => $this->location_Plains,
                'description' => json_encode(
                    [
                        'en' => 'on the last floor of the Light Habitat',
                        'hu' => 'fény élőhely utolsó szintjéért',
                    ]
                ),
                'properties' => json_encode([]),
                'rank' => 2000,
                'category_id' => $this->getCategoryId('light'),
            ],
        ]);
    }
}
