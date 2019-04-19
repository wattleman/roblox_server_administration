<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_user', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('game_id')->unsigned();
            $table->bigInteger('roblox_user')->unsigned();
            $table->string('admin_level')->nullable();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('roblox_user')->references('roblox_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_user', function (Blueprint $table) {
            Schema::dropIfExists('game_user');
        });
    }
}
