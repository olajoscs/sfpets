<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PetCategorySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ShadowPetSeeder::class);
        $this->call(LightPetSeeder::class);
        $this->call(EarthPetSeeder::class);
        $this->call(FirePetSeeder::class);
        $this->call(WaterPetSeeder::class);
    }
}
