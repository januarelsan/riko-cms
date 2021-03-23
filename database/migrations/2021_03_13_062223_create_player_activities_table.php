<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_activities', function (Blueprint $table) {
            $table->id();            
            $table->string('player_firebase_uuid');            
            $table->foreignId('activity_id')->constrained('activities');            
            $table->timestamps();

            $table->foreign('player_firebase_uuid')->references('firebase_uuid')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_activities');
    }
}
