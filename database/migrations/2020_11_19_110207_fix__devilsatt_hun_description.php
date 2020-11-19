<?php

use Illuminate\Database\Migrations\Migration;

class FixDevilsattHunDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('pets')
            ->where('id', '=', 19)
            ->update([
                'description' => json_encode([
                    'en' => 'when clearing the 13th dungeon of the Shadow World',
                    'hu' => 'az árnyvilági 13. kazamata 10. szintjének megtisztítása után',
                ])
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('pets')
            ->where('id', '=', 19)
            ->update([
                'description' => json_encode([
                    'en' => 'when clearing the 13th dungeon of the Shadow World',
                    'hu' => 'az árnyvilág megtisztítása után',
                ])
             ]);
    }
}
