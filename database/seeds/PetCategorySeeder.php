<?php

use Illuminate\Database\Seeder;

class PetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pet_categories')->insert([
            [
                'name' => json_encode([
                    'en' => 'shadow',
                    'hu' => 'árnyék'
                ])
            ],
            [
                'name' => json_encode([
                    'en' => 'light',
                    'hu' => 'fény',
                ])
            ],
            [
                'name' => json_encode([
                    'en' => 'earth',
                    'hu' => 'föld',
                ])
            ],
            [
                'name' => json_encode([
                    'en' => 'fire',
                    'hu' => 'tűz',
                ])
            ],
            [
                'name' => json_encode([
                    'en' => 'water',
                    'hu' => 'víz',
                ])
            ],
        ]);
    }
}
