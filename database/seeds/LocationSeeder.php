<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'name' => json_encode([
                    'en' => 'Nevermoor',
                    'hu' => 'Sohamár-láp',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Flooded Caldwell',
                    'hu' => 'Scarpa | Scarpa-sziget | elárasztott Scarpa',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Black Water Swamp',
                    'hu' => 'Feketevíz-mocsár',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Tusk Mountain',
                    'hu' => 'Agyar-hegység',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Busted Lands',
                    'hu' => 'Disznókopár',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Moldy Forest',
                    'hu' => 'Moslék-erdő',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Split Canyon',
                    'hu' => 'Szakadékos-kanyon',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Sunburn Desert',
                    'hu' => 'Napégette-sivatag',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Plains of Oz\'Korr',
                    'hu' => 'Oz\'Korr mezeje | Oz\'korr fennsíkja',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Sprawling Jungle',
                    'hu' => 'Burjánzó-dzsungel',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Stumble Steppe',
                    'hu' => 'Blamázspuszta',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Black Forest',
                    'hu' => 'Fekete-erdő',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Magmaron',
                    'hu' => 'Magmaron',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Evernight Forest',
                    'hu' => 'Örök éj erdeje',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Maerwynn',
                    'hu' => 'Maerwynn',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Skull Island',
                    'hu' => 'Halálfej-sziget | koponya-sziget',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Northrunt',
                    'hu' => 'Havasföld',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Rotten Lands',
                    'hu' => 'Rothadtföld',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Erogenion',
                    'hu' => 'Erogenion',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Shadowrock Mountain',
                    'hu' => 'Árnyasszikla-hegység',
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Gnarogrim',
                    'hu' => 'Gnarogrim',
                ]),
            ],
        ]);
    }
}
