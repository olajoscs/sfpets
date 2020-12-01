<?php

use App\Models\Pet\Pet;
use Illuminate\Database\Migrations\Migration;

class FixPetTexts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var Pet $pet */
        $pet = Pet::where('name->hu', 'Szikrfióka')->first();
        $pet->setTranslation('name', 'hu', 'Szikrafióka');
        $pet->save();

        $pet = Pet::where('name->hu', 'Frászitazz')->first();
        $pet->setTranslation('description', 'hu', 'Erőd dicsőcség csarnoka top 100 vagy 2500 dicsőség');
        $pet->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** @var Pet $pet */
        $pet = Pet::where('name->hu', 'Szikrafióka')->first();
        $pet->setTranslation('name', 'hu', 'Szikrfióka');
        $pet->save();

        $pet = Pet::where('name->hu', 'Frászitazz')->first();
        $pet->setTranslation('description', 'hu', 'Erőd disőcség csarnoka top 100 vagy 2500 dicsőség');
        $pet->save();
    }
}
