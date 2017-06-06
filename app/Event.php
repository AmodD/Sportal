<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Events;

class Event extends Model
{
	public function season()
	{
		return $this->belongsTo(Season::class);
	}

	public function format()
	{
		return $this->belongsTo(Format::class);
	}

	public function level()
	{
		return $this->belongsTo(Level::class);
	}

	public function matches()
	{
		return $this->hasMany(Match::class);
	}

	public function participants()
	{
		return $this->belongsToMany(Participant::class);
	}

	public function teams()
	{
		return $this->belongsToMany(Team::class,'player_team');
	}

	public function matchups()
	{
		return $this->hasManyThrough(Matchup::class,Match::class);
	}
	
	public function participantExitRound(\App\Participant $participant)
	{
		$matchups = $participant->with('matchups.match')
			->find($participant->id)
			->matchups
			->where('match.event_id',$this->id);

		return $this->exitStageByType($matchups,$participant);

	}

	public function leagueTable()
	{
		$events = new Events();
		return $events->getTable($this);

	}

	private function exitStageByType($matchups,$participant)
	{
		if($this->type == "KO")
		{
			foreach($matchups as $matchup)
			{
				if($matchup->result == "LOST")
				{
					return $matchup->match->round->description;
				}
			}

			return "Winner";
		}

		if($this->type == "L")
		{
			$events = new Events();
			$table = $events->getTable($this);
			$position =  $table->keys()->search($participant->id) + 1;
			if($position == 1) return "League Champions";
			else return "League Position : ".$position ;
		}

	}

}
