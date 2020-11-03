<?php

use App\Models\JWT\Token;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeparatedUsersAndTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jwt_tokens', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('user_id');
            $table->timestamp('created_at');
            $table->timestamp('last_seen')->nullable();
            $table->boolean('active');
            $table->string('source', 32);

            $table->foreign('user_id')
                ->references('id')
                ->on('jwt_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        foreach (User::all() as $user) {
            $token = new Token();

            $token->uuid = $user->uuid;
            $token->created_at = new \DateTimeImmutable();
            $token->active = true;
            $token->user_id = $user->id;
            $token->source = Token::SOURCE_MIGRATION;

            $token->save();
        }

        Schema::table('jwt_users', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jwt_users', function(Blueprint $table) {
            $table->uuid('uuid')->unique();
        });

        foreach (Token::all() as $token) {
            $user = User::find($token->user_id);

            $user->uuid = $token->uuid;

            $user->save();
        }

        Schema::dropIfExists('jwt_tokens');
    }
}
