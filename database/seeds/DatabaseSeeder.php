<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    // $this->call(UsersTableSeeder::class);
	    $this->call(SportsTableSeeder::class);

	    $this->call(UnitsTableSeeder::class);
	    $this->call(RoundsTableSeeder::class);
	    $this->call(LevelsTableSeeder::class);
//	    $this->call(FormatsTableSeeder::class);

	    factory(App\Club::class,10)->create();
	    factory(App\Tournament::class,15)->create();
	    factory(App\Season::class,50)->create();

	    factory(App\Participant::class,1000)->create();

//	    $this->call(TeamPlayerTableSeeder::class);



	    factory(App\Event::class,50)
		    ->create()
		    ->each( function ($e) {

			    $format = new App\Format;
			    $individual = $format->find($e->format_id)->individual;
			    $squad = $format->find($e->format_id)->squad;


			if( $individual && $e->type =="KO") $this->knockOuts($e,'App\Player',$squad) ;
			elseif (!$individual && $e->type =="KO") $this->knockOuts($e,'App\Team',$squad) ;
			elseif (!$individual && $e->type =="L") $this->league($e,'App\Team',$squad) ;
			else { }
 

//			    if($e->format_id == 10 || $e->format_id == 15 ) $this->singlesTennis($e);
//	    		    if($e->format_id == 8 || $e->format_id == 9) $this->hockey($e);
		    });

	    $this->call(MatchupsTableSeeder::class);
	    $this->call(ScoresTableSeeder::class);
    }

    private function knockOuts($e,$type,$squad)
    {
		$this->eventParticipants($e->id,$e->format_id,$e->totalparticipants,$type,$e->gender,'A',$squad);	

		factory(App\Match::class,4)->create(["event_id" => $e->id, "round_id" => "3", "name" => "quarters" ]);
		factory(App\Match::class,2)->create(["event_id" => $e->id, "round_id" => "2", "name" => "semis" ]);
		factory(App\Match::class)->create(["event_id" => $e->id, "round_id" => "1", "name" => "finals" ]);
    }

    private function league($e,$type,$squad)
    {
		$tp = $e->totalparticipants;
	        $this->eventParticipants($e->id,$e->format_id,$tp,$type,$e->gender,'A',$squad);
		$totalMatches = ($tp)*($tp-1);
//		for ($x=$e->totalparticipants; $x>=1; $x--)
//		{
//			$totalMatches = $totalMatches * $x;
//		}

		factory(App\Match::class,$totalMatches)->create(["event_id" => $e->id, "round_id" => "9", "name" => "league match" ]);
    }


    private function eventParticipants($eventId,$formatId,$totalParticipants,$participantType,$gender,$group,$squad)
    {
	    $player = new App\Player;
	    $participant = new App\Participant;

	    if($gender) $players = $player->getMalePlayers(); else $players = $player->getFemalePlayers();
	    
	    if($participantType == 'App\Team' )
	    {
		    $format = new App\Format;
		    $sport = $format->find($formatId)->sport()->get();
		    $participants = $participant->with('participantable')->where('participantable_type',$participantType)->get();
		    $participants = $participants->where('participantable.sport_id',$sport[0]->id);
	    }
	    else
	    {
		    $participants = $players->pluck('participant');
		    $participants = $participants->splice(10,50);		    
	    }
	    
	    for($i=0 ; $i < $totalParticipants ; $i++)
	    {
		$pt = $participants->pop();
		$ptid = $pt->id;
		$tid = $pt->participantable_id;
		$participants = $participants->shuffle();
			DB::table('event_participant')->insert([
			"event_id" => $eventId,
			"participant_id" => $ptid,
			"group" => $group,
			"position" => 0	
		]);
			
		if($participantType == 'App\Team' )
		{
			$membersCount = 11;
			$noSquadName = "";
			if($squad) $membersCount = 16;
			else $membersCount = 2;
			for($j=0 ; $j < $membersCount ; $j++)
			{
				$p = $players->random();
				$pid = $p->id;
				$players->reject($p);
				DB::table('player_team')->insert([
					"event_id" => $eventId,
					"player_id" => $pid,
		        		"team_id" => $tid 	
				]);

				if(!$squad) $noSquadName .= $p->name." / ";  
			}

			if(!$squad)
			{
				$noSquadName = substr($noSquadName, 0, -2);

				DB::table('teams')
				->where('id',$tid)
				->update(["name" => $noSquadName]);
			}
		}
	    
	    }
	    
    }

}
