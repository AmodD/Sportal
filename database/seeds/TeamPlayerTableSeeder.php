<?php

use Illuminate\Database\Seeder;

class TeamPlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	$teams = new App\Team;
	$teamCount = $teams->all()->count();
	$participant = new App\Participant;
	$players = $participant->where('participantable_type','App\Player')->get();

	for ($i = 1; $i <= $teamCount; $i++) {

		for ($j = 1; $j <= rand(2,11) ; $j++){

			DB::table('team_player')->insert([
				"team_id" => $i,
				"player_id" => $players->random()->id
			]);
		}
	}

    }
}
