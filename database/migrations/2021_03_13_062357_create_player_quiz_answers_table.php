<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerQuizAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_activity_id')->constrained('player_activities');
            $table->foreignId('option_id')->constrained('options');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_quiz_answers');
    }
}
