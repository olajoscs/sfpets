<?php

use App\Models\Pet\Pet;
use Illuminate\Database\Migrations\Migration;

class UpdatePetDescriptionsUpperCaseFirst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Pet::all()->each(function(Pet $pet) {
            $pet->setTranslation('description', 'hu', ucfirst($pet->getTranslation('description', 'hu')));
            $pet->setTranslation('description', 'en', ucfirst($pet->getTranslation('description', 'en')));

            $pet->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
