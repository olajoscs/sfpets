<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterPetFound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_pet_found', function (Blueprint $table) {
            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('pet_id');
            $table->timestamps();

            $table
                ->foreign('character_id')
                ->references('id')
                ->on('characters')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('pet_id')
                ->references('id')
                ->on('pets')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['character_id', 'pet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_pet_found');
    }
}
