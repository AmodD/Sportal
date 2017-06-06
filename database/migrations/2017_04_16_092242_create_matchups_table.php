<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchups', function (Blueprint $table) {
		$table->increments('id');
		$table->unsignedInteger('match_id');
		$table->unsignedInteger('participant_id');
		$table->char('result',4);// WON LOST DRAW 1ST 2ND 3RD 4TH  // previously  0 - lost , 1 - won/1st , 2 - second 3 - third, 99 - draw 
		$table->string('name');
		$table->smallInteger('final_score');
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
        Schema::dropIfExists('matchups');
    }
}
