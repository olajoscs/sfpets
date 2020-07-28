<?php

declare(strict_types=1);

class WaterPetSeeder extends PetSeeder
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
                    'en' => 'Goldy',
                    'hu' => 'Aranyoskám',
                ]),
                'location_id' => $this->location_Magmaron,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 100,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Orcahle',
                    'hu' => 'Orkapa',
                ]),
                'location_id' => $this->location_Skull,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 200,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Ocodile',
                    'hu' => 'Okodili',
                ]),
                'location_id' => $this->location_Evernight,
                'description' => json_encode([
                    'en' => 'at night',
                    'hu' => 'éjjel',
                ]),
                'properties' => json_encode([]),
                'rank' => 300,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Penguwater',
                    'hu' => 'Vízkapingvi',
                ]),
                'location_id' => $this->location_Northrunt,
                'description' => json_encode([
                    'en' => 'during the day',
                    'hu' => 'nappal',
                ]),
                'properties' => json_encode([]),
                'rank' => 400,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Walrophin',
                    'hu' => 'Rozfin',
                ]),
                'location_id' => $this->location_Rotten,
                'description' => json_encode([
                    'en' => 'on Monday during the day',
                    'hu' => 'hétfő napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'monday',
                ]),
                'rank' => 500,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Colsnail',
                    'hu' => 'Tocsigi',
                ]),
                'location_id' => $this->location_Tusk,
                'description' => json_encode([
                    'en' => 'on Tuesday night',
                    'hu' => 'kedd éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'tuesday',
                ]),
                'rank' => 600,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Aquaphant',
                    'hu' => 'Akvafánt',
                ]),
                'location_id' => $this->location_Split,
                'description' => json_encode([
                    'en' => 'on Wednesday during the day',
                    'hu' => 'szerda napközben',
                ]),
                'properties' => json_encode([
                    'day' => 'wednesday',
                ]),
                'rank' => 700,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Naar',
                    'hu' => 'Naar',
                ]),
                'location_id' => $this->location_Flooded,
                'description' => json_encode([
                    'en' => 'on winter days',
                    'hu' => 'téli napokon',
                ]),
                'properties' => json_encode([
                    'season' => 'winter',
                ]),
                'rank' => 800,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Octoboss',
                    'hu' => 'Popoliposz',
                ]),
                'location_id' => $this->location_Moldy,
                'description' => json_encode([
                    'en' => 'on Thursday night',
                    'hu' => 'csütörtök éjjel'
                ]),
                'properties' => json_encode([
                    'day' => 'thursday',
                ]),
                'rank' => 900,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Ewilgryn',
                    'hu' => 'Ewilgryn',
                ]),
                'location_id' => $this->location_Skull,
                'description' => json_encode([
                    'en' => 'on Friday during the day',
                    'hu' => 'péntek napközben'
                ]),
                'properties' => json_encode([
                    'day' => 'friday',
                ]),
                'rank' => 1000,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Seapard',
                    'hu' => 'Vizinyihi',
                ]),
                'location_id' => $this->location_BlackWater,
                'description' => json_encode([
                    'en' => 'on Saturday during the day',
                    'hu' => 'szombaton',
                ]),
                'properties' => json_encode([
                    'day' => 'saturday',
                ]),
                'rank' => 1100,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Shellzy',
                    'hu' => 'Kagylek',
                ]),
                'location_id' => $this->location_Erogenion,
                'description' => json_encode([
                    'en' => 'on fall nights',
                    'hu' => 'őszi éjszakákon',
                ]),
                'properties' => json_encode([
                    'season' => 'fall',
                ]),
                'rank' => 1200,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Mingho',
                    'hu' => 'Mingáciusz',
                ]),
                'location_id' => $this->location_Sprawling,
                'description' => json_encode([
                    'en' => 'on summer days',
                    'hu' => 'nyári napokon',
                ]),
                'properties' => json_encode([
                    'season' => 'summer',
                ]),
                'rank' => 1300,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Angbite',
                    'hu' => 'Harpek',
                ]),
                'location_id' => $this->location_Shadowrock,
                'description' => json_encode([
                    'en' => 'on Sunday night',
                    'hu' => 'vasárnap éjjel',
                ]),
                'properties' => json_encode([
                    'day' => 'sunday',
                ]),
                'rank' => 1400,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Mermoid',
                    'hu' => 'Kellsellina',
                ]),
                'location_id' => $this->location_Skull,
                'description' => json_encode([
                    'en' => 'Required: Pets hall of fame top 100 or 4.000 honor',
                    'hu' => 'Feltétel: Kedvencek dicsőség csarnoka top 100 vagy 4.000 dicsőség',
                ]),
                'properties' => json_encode([]),
                'rank' => 1500,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Watnake',
                    'hu' => 'Vízkígy',
                ]),
                'location_id' => $this->location_Magic,
                'description' => json_encode([
                    'en' => 'Can\'t be found in the wild, but in your local magic shop',
                    'hu' => 'Nem a vadonban találod, hanem a helyi varászboltban',
                ]),
                'properties' => json_encode([]),
                'rank' => 1600,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Cannoturtle',
                    'hu' => 'Löviteki',
                ]),
                'location_id' => $this->location_Skull,
                'description' => json_encode([
                    'en' => 'during the Birthday event',
                    'hu' => 'Születésnap esemény alatt',
                ]),
                'properties' => json_encode([
                    'event' => 'birthday',
                ]),
                'rank' => 1700,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Unhere',
                    'hu' => 'Toccsatapla',
                ]),
                'location_id' => $this->location_Arcane,
                'description' => json_encode([
                    'en' => 'Arcaine Toilet - Required: Aura level 20',
                    'hu' => 'Misztikus klotyó - Követelmény: 20. szintű aura',
                ]),
                'properties' => json_encode([]),
                'rank' => 1800,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Tritosting',
                    'hu' => 'Szigopapek',
                ]),
                'location_id' => $this->location_Busted,
                'description' => json_encode([
                    'en' => 'after clearing dungeon 14.',
                    'hu' => 'a 14 kazamata megtisztítása után',
                ]),
                'properties' => json_encode([]),
                'rank' => 1900,
                'category_id' => $this->getCategoryId('water'),
            ],
            [
                'name' => json_encode([
                    'en' => 'Hydrospir',
                    'hu' => 'Hydrospir',
                ]),
                'location_id' => $this->location_Nevermoor,
                'description' => json_encode([
                    'en' => 'on the last floor of the Water Habitat',
                    'hu' => 'víz élőhely utolsó szintjéért',
                ]),
                'properties' => json_encode([]),
                'rank' => 2000,
                'category_id' => $this->getCategoryId('water'),
            ],
        ]);
    }
}
