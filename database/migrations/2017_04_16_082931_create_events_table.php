<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
		$table->increments('id');
		$table->string('name');
		$table->unsignedInteger('season_id');
		$table->unsignedMediumInteger('format_id');
		$table->unsignedMediumInteger('level_id');
		$table->unsignedSmallInteger('gender'); // 0- female 1- male 2- mixed
		$table->char('type',4); // 1-KO 2-L League 3- GAKO Group + KO 4 - S Series 5 - F Friendly 
		$table->unsignedSmallInteger('totalparticipants'); // total number of participants for an event
		$table->unsignedSmallInteger('winpts'); // points for a win
		$table->unsignedSmallInteger('status');// 0 - upcoming , 1 - ongoing , 2- finsished

                $table->timestamps();
	});


	Schema::create('event_participant', function (Blueprint $table) {
		$table->integer('event_id');
		$table->integer('participant_id');
		$table->char('group',1);
		$table->unsignedSmallInteger('position'); // position of participant in group/league
//		$table->primary(['event_id','participant_id']);
	});
	
	Schema::create('player_team', function (Blueprint $table) {
		$table->integer('event_id');
		$table->integer('team_id');
		$table->integer('player_id');
//		$table->primary(['event_id','participant_id']);
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_participant');
        Schema::dropIfExists('squads');
        Schema::dropIfExists('event_team_player');
        Schema::dropIfExists('player_team');
    }
}
