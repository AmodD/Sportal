<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
		$table->increments('id');
		$table->string('name');
		$table->unsignedMediumInteger('club_id');
		$table->unsignedMediumInteger('sport_id');
		$table->string('website');
		$table->text('slogan');
		$table->string('sponsor');
		$table->string('location');
		$table->unsignedSmallInteger('established');
            	$table->timestamps();
	});

	
	Schema::create('team_player', function (Blueprint $table) {
		$table->integer('team_id');
		$table->integer('player_id');
//		$table->primary(['team_id','player_id']);
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('team_player');
    }
}
