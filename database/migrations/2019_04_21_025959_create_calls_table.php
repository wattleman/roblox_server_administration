<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('place_id')->unsigned();
            $table->string('server_id')->default("Error");

            $table->string('caller')->default('Unknown');

            $table->string('reported_user')->default('N/A');
            $table->longText('call_details')->nullable();

            $table->integer('status')->unsigned()->default(1);
                /*
                1 = Open
                2 = Dispatched
                3 = Unable to Join
                4 = Server Shutdown
                5 = Responded Actions Taken
                6 = Responded, No Actions Taken
                */

            $table->timestamps();

            $table->foreign('place_id')->references('place_id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
