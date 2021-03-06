<?php

declare(strict_types=1);

class ShadowPetSeeder extends PetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            [
                'name' => json_encode([
                    'en' => 'Slurp',
                    'hu' => 'Szörcsi',
                ]),
                'location_id' => $this->getLocationId('Nevermoor'),
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal'
                ]),
                'properties' => json_encode([]),
                'rank' => 100,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-1.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Digmol',
                    'hu' => 'Ásatag',
                ]),
                'location_id' => $this->getLocationId('Maerwynn'),
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel'
                ]),
                'properties' => json_encode([]),
                'rank' => 200,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-2.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Toothey',
                    'hu' => 'Csupafog',
                ]),
                'location_id' => $this->getLocationId('Sprawling Jungle'),
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel'
                ]),
                'properties' => json_encode([]),
                'rank' => 300,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-3.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Okultace',
                    'hu' => 'Okulcsáp',
                ]),
                'location_id' => $this->getLocationId('Split Canyon'),
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel'
                ]),
                'properties' => json_encode([]),
                'rank' => 400,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-4.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Spidor',
                    'hu' => 'Pókor',
                ]),
                'location_id' => $this->getLocationId('Black Forest'),
                'description' => json_encode([
                    'en' => 'on Monday night',
                    'hu' => 'hétfő éjjel'
                ]),
                'properties' => json_encode([
                    'day' => 'monday',
                ]),
                'rank' => 500,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-5.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Jackobu',
                    'hu' => 'Lámpító',
                ]),
                'location_id' => $this->getLocationId('Black Water Swamp'),
                'description' => json_encode([
                    'en' => 'during witching hour (0:00 - 1:00)',
                    'hu' => 'a boszorkányok órájában (0:00 - 1:00)'
                ]),
                'properties' => json_encode([]),
                'rank' => 600,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-6.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Shrimpfly',
                    'hu' => 'Ráklégy',
                ]),
                'location_id' => $this->getLocationId('Evernight Forest'),
                'description' => json_encode([
                    'en' => 'on summer days',
                    'hu' => 'nyári napokon'
                ]),
                'properties' => json_encode([
                    'season' => 'summer'
                ]),
                'rank' => 700,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-7.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Reaprim',
                    'hu' => 'Kaszásatag',
                ]),
                'location_id' => $this->getLocationId('Skull Island'),
                'description' => json_encode([
                    'en' => 'on winter days',
                    'hu' => 'téli napokon'
                ]),
                'properties' => json_encode([
                    'season' => 'winter',
                ]),
                'rank' => 800,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-8.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Petdacat',
                    'hu' => 'Vérmaccs',
                ]),
                'location_id' => $this->getLocationId('Shadowrock Mountain'),
                'description' => json_encode([
                    'en' => 'on Friday night',
                    'hu' => 'péntek éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'friday',
                ]),
                'rank' => 900,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-9.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Mykon',
                    'hu' => 'Mykon',
                ]),
                'location_id' => $this->getLocationId('Moldy Forest'),
                'description' => json_encode([
                    'en' => 'on fall days',
                    'hu' => 'őszi napokon'
                ]),
                'properties' => json_encode([
                    'season' => 'fall',
                ]),
                'rank' => 1000,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-10.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Fishorr',
                    'hu' => 'Sötétbojt',
                ]),
                'location_id' => $this->getLocationId('Flooded Caldwell'),
                'description' => json_encode([
                    'en' => 'on Monday night',
                    'hu' => 'hétfő éjjel'
                ]),
                'properties' => json_encode([
                    'day' => 'monday',
                ]),
                'rank' => 1100,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-11.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Cuckooly',
                    'hu' => 'Kuklic',
                ]),
                'location_id' => $this->getLocationId('Tusk Mountain'),
                'description' => json_encode([
                    'en' => 'on Tuesday night',
                    'hu' => 'kedd éjjel'
                ]),
                'properties' => json_encode([
                    'day' => 'tuesday',
                ]),
                'rank' => 1200,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-12.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Battlutter',
                    'hu' => 'Denevérengz',
                ]),
                'location_id' => $this->getLocationId('Erogenion'),
                'description' => json_encode([
                    'en' => 'on Wednesday night',
                    'hu' => 'szerda éjjel'
                ]),
                'properties' => json_encode([
                    'day' => 'wednesday',
                ]),
                'rank' => 1300,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-13.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Pinklynx',
                    'hu' => 'Pinkhúz',
                ]),
                'location_id' => $this->getLocationId('Stumble Steppe'),
                'description' => json_encode([
                    'en' => 'on Thursday day',
                    'hu' => 'csütörtök nappal'
                ]),
                'properties' => json_encode([
                    'day' => 'thursday',
                ]),
                'rank' => 1400,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-14.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Pharamumm',
                    'hu' => 'Fáramumm',
                ]),
                'location_id' => $this->getLocationId('Black Forest'),
                'description' => json_encode([
                    'en' => 'on Halloween',
                    'hu' => 'halloweenkor'
                ]),
                'properties' => json_encode([
                    'special' => 'halloween',
                ]),
                'rank' => 1500,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-15.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Ninstarr',
                    'hu' => 'Nindcsill',
                ]),
                'location_id' => $this->getLocationId('Gnarogrim'),
                'description' => json_encode([
                    'en' => 'when Hall of fame top 1.000 or 50.000 honor',
                    'hu' => 'követelmény: Dicsőség csarnoka top 1000-ben vagy 50 000 dicsőség'
                ]),
                'properties' => json_encode([]),
                'rank' => 1600,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-16.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Luchtablong',
                    'hu' => 'Luchtablong',
                ]),
                'location_id' => $this->getLocationId('Busted Lands'),
                'description' => json_encode([
                    'en' => 'during XP event',
                    'hu' => 'tapasztalat esemény alatt'
                ]),
                'properties' => json_encode([
                    'event' => 'xp'
                ]),
                'rank' => 1700,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-17.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Angrack',
                    'hu' => 'Dühlovig',
                ]),
                'location_id' => $this->getLocationId('Rotten Lands'),
                'description' => json_encode([
                    'en' => 'on Friday the 13th',
                    'hu' => 'péntek 13-án'
                ]),
                'properties' => json_encode([
                    'date' => [
                        'day' => 13,
                    ],
                    'day' => 'friday',
                ]),
                'rank' => 1800,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-18.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Devilsatt',
                    'hu' => 'Árnyördi',
                ]),
                'location_id' => $this->getLocationId('Plains of Oz\'korr'),
                'description' => json_encode([
                    'en' => 'when clearing the 13th dungeon of the Shadow World',
                    'hu' => 'az árnyvilági 13. kazamata 10. szintjének megtisztítása után',
                ]),
                'properties' => json_encode([]),
                'rank' => 1900,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-19.png',
            ],

            [
                'name' => json_encode([
                    'en' => 'Poisnake',
                    'hu' => 'Mérgekígy',
                ]),
                'location_id' => $this->getLocationId('Sunburn Desert'),
                'description' => json_encode([
                    'en' => 'on the last floor of the Shadow Habitat',
                    'hu' => 'árnyék élőhely utolsó szintjéért'
                ]),
                'properties' => json_encode([]),
                'rank' => 2000,
                'category_id' => $this->getCategoryId('shadow'),
                'image' => 'shadow-20.png',
            ],
        ]);
    }
}
