<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
		$table->increments('id');
		$table->unsignedInteger('matchup_id');
		$table->unsignedInteger('player_id');
		$table->unsignedSmallInteger('part');
		$table->Integer('score');
		$table->unsignedSmallInteger('unit_id');
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
        Schema::dropIfExists('scores');
    }
}
