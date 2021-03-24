<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerFinishMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_finish_missions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_activity_id')->constrained('player_activities');
            $table->integer('scores');
            $table->integer('play_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_finish_missions');
    }
}
