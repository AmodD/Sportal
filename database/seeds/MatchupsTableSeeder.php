<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class MatchupsTableSeeder extends Seeder
{

public $selectedW = 1;
public $selectedL = 0;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	$e = new App\Event;
	$scores  = collect([0,1,2,1,4,0,3,2,1,0,1,4,1,0,0,5,2,3,2,0,3]);

	$events = $e->with('matches','participants','format')->get();

	foreach($events as $event)
	{
		$matches = $event->matches;
		$participants = $event->participants;
		$format = $event->format; // to decide competitors and thus no of matchups
		$home = $participants;
		$away = $participants;

		if($event->type == 'L')
		{
			$matchups = $this->getLeagueMatchups($participants);
		}

		foreach($matches as $match)
		{
			if($event->type == 'KO')
			{
				$winner = $participants->pop();
				$loser = $participants->pop();
				$participants->prepend($winner);
				$this->createMatchup($match->id,$winner->id,'WON',$this->getWinningScore($scores));
				$this->createMatchup($match->id,$loser->id,'LOST',$this->getLosingScore($scores));
			}
			elseif($event->type == 'L')
			{
				$matchup = $matchups->shift();
				$team1 = $matchup->get('p1');
				$team2 = $matchup->get('p2');
				if(rand(0,1)) 
				{
					$this->createMatchup($match->id,$team1->id,'WON',$this->getWinningScore($scores));
					$this->createMatchup($match->id,$team2->id,'LOST',$this->getLosingScore($scores));
				}
				else
				{
					if(rand(0,1))
					{
						$this->createMatchup($match->id,$team1->id,'LOST',$this->getLosingScore($scores));
						$this->createMatchup($match->id,$team2->id,'WON',$this->getWinningScore($scores));
					}
					else
					{
						$score = rand(0,2);
						$this->createMatchup($match->id,$team1->id,'DRAW',$score);
						$this->createMatchup($match->id,$team2->id,'DRAW',$score);
					}
				}
			}
			else
			{
			}

		}
	}
    }

	private function createMatchup($matchID,$participantID,$result,$score)
	{
		factory(App\Matchup::class)->create([
			"match_id"=>$matchID,
			"participant_id"=>$participantID,
			"result"=>$result,
			"final_score"=>$score
		]);	

	}	

    private function getWinningScore($scores)
    {

	$filtered = $scores->reject(function ($value,$key) { 
		return $value < 1  ; 
	});

	$this->selectedW = $filtered->random();

	return $this->selectedW;
    }

    private function getLosingScore($scores)
    {

	$filteredL = $scores->filter(function ($value, $key ) { 
		return $value <  $this->selectedW  ; 
	});

	return $filteredL->random();
    }

    private function getLeagueMatchups($participants)
    {
	$matchupsC = collect([]);
	$homeTeams = $participants;
	$awayTeams = $participants;

	foreach($homeTeams as $home)
	{
		foreach($awayTeams->except($home->id) as $away)
		{
			$matchupC = collect([]);
			
			$matchupC->put('p1',$home);
			$matchupC->put('p2',$away);
			
			$matchupsC->push($matchupC);
		}
	}

	return $matchupsC->shuffle();
    }

}
