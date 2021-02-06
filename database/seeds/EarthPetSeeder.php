<?php

declare(strict_types=1);

class EarthPetSeeder extends PetSeeder
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
                    'en' => 'Mamoton',
                    'hu' => 'Mamoton',
                ]),
                'location_id' => $this->location_Stumble,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 100,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-1.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Monkorrage',
                    'hu' => 'Ökli',
                ]),
                'location_id' => $this->location_Gnarogrim,
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel',
                ]),
                'properties' => json_encode([]),
                'rank' => 200,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-2.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Smaponyck',
                    'hu' => 'Sompóni',
                ]),
                'location_id' => $this->location_Erogenion,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 300,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-3.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Bittnutz',
                    'hu' => 'Mókasza',
                ]),
                'location_id' => $this->location_BlackForest,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 400,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-4.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Roarear',
                    'hu' => 'Groáró',
                ]),
                'location_id' => $this->location_Northrunt,
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel',
                ]),
                'properties' => json_encode([]),
                'rank' => 500,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-5.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Muscudon',
                    'hu' => 'Izmodon',
                ]),
                'location_id' => $this->location_Tusk,
                'description' => json_encode([
                    'en' => 'on summer days',
                    'hu' => 'nyári napokon',
                ]),
                'properties' => json_encode([
                    'season' => 'summer',
                ]),
                'rank' => 600,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-6.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Apstick',
                    'hu' => 'Majmkós',
                ]),
                'location_id' => $this->location_BlackWater,
                'description' => json_encode([
                    'en' => 'on fall days',
                    'hu' => 'őszi napokon',
                ]),
                'properties' => json_encode([
                    'season' => 'fall',
                ]),
                'rank' => 700,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-7.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Horrnington',
                    'hu' => 'Szarvington',
                ]),
                'location_id' => $this->location_Split,
                'description' => json_encode([
                    'en' => 'on winter days',
                    'hu' => 'téli napokon'
                ]),
                'properties' => json_encode([
                    'season' => 'winter',
                ]),
                'rank' => 800,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-8.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Boaringg',
                    'hu' => 'Vadkóca',
                ]),
                'location_id' => $this->location_Magmaron,
                'description' => json_encode([
                    'en' => 'on spring nights',
                    'hu' => 'tavaszi éjszakákon',
                ]),
                'properties' => json_encode([
                    'season' => 'spring',
                ]),
                'rank' => 900,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-9.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Mameloth',
                    'hu' => 'Mameloth',
                ]),
                'location_id' => $this->location_Nevermoor,
                'description' => json_encode([
                    'en' => 'on Sunday night',
                    'hu' => 'vasárnap éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'sunday',
                ]),
                'rank' => 1000,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-10.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Rheynooh',
                    'hu' => 'Orraszarvek',
                ]),
                'location_id' => $this->location_Maerwynn,
                'description' => json_encode([
                    'en' => 'on Monday during the day',
                    'hu' => 'hétfő napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'monday',
                ]),
                'rank' => 1100,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-11.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Rockastonn',
                    'hu' => 'Köviszikl',
                ]),
                'location_id' => $this->location_Busted,
                'description' => json_encode([
                    'en' => 'on Tuesday night',
                    'hu' => 'kedd éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'tuesday',
                ]),
                'rank' => 1200,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-12.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Redwoofox',
                    'hu' => 'Ravaszdekli',
                ]),
                'location_id' => $this->location_Evernight,
                'description' => json_encode([
                    'en' => 'on Wednesday during the day',
                    'hu' => 'szerda napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'wednesday',
                ]),
                'rank' => 1300,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-13.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Lilbeatzup',
                    'hu' => 'Áskamanter',
                ]),
                'location_id' => $this->location_Rotten,
                'description' => json_encode([
                    'en' => 'on Thursday during the day',
                    'hu' => 'csütörtök napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'thursday',
                ]),
                'rank' => 1400,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-14.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Forror',
                    'hu' => 'Enteperte',
                ]),
                'location_id' => $this->location_Maerwynn,
                'description' => json_encode([
                    'en' => 'on Easter',
                    'hu' => 'húsvétkor',
                ]),
                'properties' => json_encode([
                    'special' => 'easter',
                ]),
                'rank' => 1500,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-15.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Nipprabs',
                    'hu' => 'Rémiráki',
                ]),
                'location_id' => $this->location_Sprawling,
                'description' => json_encode([
                    'en' => 'on Whitsun',
                    'hu' => 'pünkösdkor',
                ]),
                'properties' => json_encode([
                    'special' => 'whitsun',
                ]),
                'rank' => 1600,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-16.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Armoruck',
                    'hu' => 'Tankakecskec',
                ]),
                'location_id' => $this->location_Plains,
                'description' => json_encode([
                    'en' => 'during Gold event',
                    'hu' => 'arany esemény alatt',
                ]),
                'properties' => json_encode([
                    'event' => 'gold',
                ]),
                'rank' => 1700,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-17.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Canocle',
                    'hu' => 'Frászitazz',
                ]),
                'location_id' => $this->location_Stumble,
                'description' => json_encode([
                    'en' => 'Fortress Hall of Fame top 100 or 2.500 honor',
                    'hu' => 'Erőd dicsőcség csarnoka top 100 vagy 2500 dicsőség',
                ]),
                'properties' => json_encode([]),
                'rank' => 1800,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-18.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Tricerawood',
                    'hu' => 'Göcsör',
                ]),
                'location_id' => $this->location_Gem,
                'description' => json_encode([
                    'en' => 'Required: Mine level 20',
                    'hu' => 'Követelmény: 20. szintű bánya',
                ]),
                'properties' => json_encode([]),
                'rank' => 1900,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-19.png',
            ],
            [
                'name' => json_encode([
                    'en' => 'Mouthrexor',
                    'hu' => 'Pofoszaur',
                ]),
                'location_id' => $this->location_Moldy,
                'description' => json_encode([
                    'en' => 'on the last floor of the Earth Habitat',
                    'hu' => 'föld élőhely utolsó szintjéért',
                ]),
                'properties' => json_encode([]),
                'rank' => 2000,
                'category_id' => $this->getCategoryId('earth'),
                'image' => 'earth-20.png',
            ],
        ]);
    }
}
