<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallBlacklistedPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_blacklisted_players', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('roblox_id');

            $table->bigInteger('blacklisted_by')->unsigned();
            $table->string('reason');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_blacklisted_players');
    }
}
