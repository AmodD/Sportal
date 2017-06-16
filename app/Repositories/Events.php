<?php

namespace App\Repositories;

use App\Event;

class Events
{
	public function getData(Event $event)
	{
		$data = collect([]);

		$event = $event::with('matches.matchups.participant.participantable',
					'matches.matchups.scores.player',
					'participants.participantable',
					'participants.matchups.match.event'
//					'participants.matchups.scores.player'
				)->find($event->id);

//		dd($event);

		$data->put("event",$event);

		if($event->type == 'L')
		{
			$data->put("table",$this->getTable($event));
			$data->put("matchdays",$this->getMatchDays($event));
		}
		
		return $data;
	}

	private function getMatchDays($event)
	{
		$matches = $event->matches;
		$matchdayC = collect([]);
		$homeSidesC = collect([]);
		$awaySidesC = collect([]);

		foreach($matches as $match)
		{
			$matchups = $match->matchups;
			
			$matchC = collect([]);
			$matchC->put('team1',$matchups->get(0)->participant->participantable->name);
			$matchC->put('score1',$matchups->get(0)->final_score);
			$homeSidesC->push($matchC);
		
			$matchC = collect([]);
			$matchC->put('team2',$matchups->get(1)->participant->participantable->name);
			$matchC->put('score2',$matchups->get(1)->final_score);
			$awaySidesC->push($matchC);
		}

		$matchdayC->put('home',$homeSidesC);
		$matchdayC->put('away',$awaySidesC);

		return $matchdayC;
		
	}

	public function getTable($event)
	{
			$participants = $event->participants;
			$tableC = collect([]);

			foreach($participants as $participant)
			{
				$teamsC = collect([]);
				$played = $participant->matchups->where('match.event_id',$event->id)->count();
				$won = $participant->matchups
					->where('match.event_id',$event->id)
					->where('result','WON')
					->count();
					//->sum('result');
				$lost = $participant->matchups
					->where('match.event_id',$event->id)
					->where('result','LOST')
					->count();
//				$lost = $played - $won;
				$draws = $participant->matchups
					->where('match.event_id',$event->id)
					->where('result','DRAW')
					->count();
//				$draws = 0;
				$link = '/teams/'.$participant->participantable_id;
				$points = ( $event->winpts * ($won) ) + $draws;
				$scored = $participant->matchups->where('match.event_id',$event->id)->sum('final_score');
				$accepted = $this->getGoalsAccepted($event,$participant);
				$difference = $scored - $accepted ;

				// commented because for sorting + - is not considered
				//if($difference > 0) $difference = "+".$difference;
//				if($difference ==  0) $difference = "0".$difference;

				$teamsC->put("name",$participant->participantable->name);
				$teamsC->put("link",$link);
				$teamsC->put("played",$played);
				$teamsC->put("won",$won);
				$teamsC->put("draws",$draws);
				$teamsC->put("lost",$lost);
				$teamsC->put("scored",$scored);
				$teamsC->put("accepted",$accepted);
				$teamsC->put("difference",$difference);
				$teamsC->put("points",$points);

				//	$tableC->push($teamsC);
				$tableC->put($participant->id,$teamsC);
			}
//https://stackoverflow.com/questions/25451019/what-is-the-syntax-for-sorting-an-eloquent-collection-by-multiple-columns
			$tableC = $tableC->sortByDesc(function($tableC) {
				    return sprintf('%-12s%s', $tableC->get('points'), $tableC->get('difference') , $tableC->get('scored') );
			});

			//return $tableC;
			return $tableC->sortByDesc('points');

	}

	private function getGoalsAccepted($event,$participant)
	{
		$matches = $event->matches;
		$goalsA = 0;

		foreach($matches as $match)
		{
			if($match->matchups->contains('participant_id',$participant->id))
			{
				$goalsA += $match->matchups->whereNotIn('participant_id',$participant->id)->sum('final_score');
			}
		}
		
		return $goalsA;	
	}
}
