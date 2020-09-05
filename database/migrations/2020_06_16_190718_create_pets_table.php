<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('category_id');
            $table->json('description');
            $table->json('properties');
            $table->unsignedSmallInteger('rank');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('pet_categories')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
