<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenNumericField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jwt_tokens', function(Blueprint $table) {
            $table->string('connection_code')->nullable();
            $table->boolean('connection_code_used')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jwt_tokens', function (Blueprint $table) {
            $table->dropColumn('connnection_code');
            $table->dropColumn('connection_code_used');
        });
    }
}
