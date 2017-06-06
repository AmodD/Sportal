<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $matchup = new App\Matchup;

	    $matchups = $matchup::with('participant')->get();

            foreach($matchups as $m)
	    {
		    if($m->result == 'WON') 
			    factory(App\Score::class,2)->create(["matchup_id" => $m->id ,"player_id" => $m->participant->participantable_id]);
		    else {
			    
			    factory(App\Score::class)->create(["matchup_id" => $m->id ,"player_id" => $m->participant->participantable_id, "score" => rand(0,4)]); 
			    factory(App\Score::class)->create(["matchup_id" => $m->id ,"player_id" => $m->participant->participantable_id, "score" => rand(0,4)]); 
		    }

	    }
    }
}
