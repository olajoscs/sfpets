<?php

use App\Models\Pet\Pet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePetDescriptionsToNewEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Pet::find(17)
            ->setTranslation('description', 'hu', 'Töméntelen tapasztalat találkozó idején')
            ->setTranslation('description', 'en', 'During Exceptional XP Event')
            ->save();

        Pet::find(38)
            ->setTranslation('description', 'hu', 'Az eposzi extrém estek idején')
            ->setTranslation('description', 'en', 'During Epic Extravaganza')
            ->save();

        Pet::find(57)
            ->setTranslation('description', 'hu', 'Az Andalító Aranyfesztivál idején')
            ->setTranslation('description', 'en', 'During Glorious Gold Galore')
            ->save();

        Pet::find(76)
            ->setTranslation('description', 'hu', 'Ha eljön a Kipucolt Klotyók kora')
            ->setTranslation('description', 'en', 'During Tidy Toilet Time')
            ->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_events', function (Blueprint $table) {
            //
        });
    }
}
