<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Player extends Model
{
	public function teams()
	{
		return $this->belongsToMany(Team::class)->withPivot('event_id');
	}

	public function participant()
	{
		return $this->morphOne(Participant::class,'participantable');
	}
	
	public function scores()
	{
		return $this->hasMany(Score::class);
	}

	public static function search($data)
	{
		return static::where('name','like',$data)->get();
	}

	public function events()
	{
		return $this->with('participant')->find($this->id)->participant->events()->get();
//		return $this->hasManyThrough(Event::class,Participant::class);
	}


	public function seasons()
	{
		$seasons = collect([]);
		$teams = $this->teams()->get();
		
		foreach($teams as $team)
		{
			foreach($team->playerEvents() as $event)
			{
			//	return $event ;
				$seasons->push($event->season()->get());
			}	
		}

		return $seasons;
	}

	public function seasonsBySports()
	{

		$seasonsBySport = collect([]);
		$teamSports = $this->teamSports();

	//	return $teamSports ; 	
		foreach($teamSports as $sport => $teams)
		{
			$seasons = collect([]);
			
			foreach($teams as $team){
			foreach($team->playerEvents() as $event)
			{
			//	return $event ;
				$seasons->push($event->season->year);
			}	
			}

			$sortedSeasons = $seasons->unique()->sort();
//			dd($sortedSeasons,$sortedSeasons->values(),$sortedSeasons->values()->all());

			$seasonsBySport->put($sport,$sortedSeasons->values());
		}

		return $seasonsBySport;

		//return $this->teams()->find(82)->playerEvents()->find(45)->season()->get();

	}

	public function eventsBySport()
	{
		$events = $this->with('participant.events.format.sport')
			->find($this->id)
				->participant->events()->get()
				->groupBy('format.sport.name');

		return $events;
	}

	public function sports()
	{
		$sports = collect([]);
		$events = $this->events();

		foreach($events as $event)
		{
			$sports->push($event->format()->first()->sport()->first()->name);
		}
	
		return $sports->unique();
	}

	public function sportFormats()	
	{
		$sportFormatsC = collect([]);
		$events = $this->events() ;
		foreach($events as $event)
		{
			$sportFormatsC->put($event->format()->first()->name,$event->format()->first()->sport()->first()->name);
		}

		return $sportFormatsC; 
	}

	public function matchups()
	{
		return $this->with('participant')->find($this->id)->participant->matchups()->get();

	}

	public function matchupsByEvent()
	{
		$matchups = $this->with('participant.matchups.match.event')
				->find($this->id)
				->participant->matchups
				->groupBy('match.event.name');

		return $matchups;
		
	}

	public function matchupsBySport()
	{
		$matchups = $this->with('participant.matchups.match.event.format.sport')
			  	 ->find($this->id)
				 ->participant->matchups
				 ->groupBy('match.event.format.sport.name',
				 	   'match.event.format.name');

		return $matchups;
	}

//	public function teams()
//	{
//		return $this->with('teams')->find($this->id) ;
//	}

	public function teamSports()
	{
		$teamSports = $this->with('teams.sport')
					->find($this->id)
					->teams
					->unique()
					->groupBy('sport.name');

		return $teamSports;
	}

	public function teamsBySport()
	{
		$teams = $this->teams()->get()
			->unique()
			->groupBy('sport_id');


		return $teams;
	}

	public function yearsActive()
	{


	}

	public function matchesPlayed($sport)
	{
		return $this->matchupsBySport()->get($sport)->count();	
	}

	public function matchesWon($sport)
	{
		return $this->matchupsBySport()->get($sport)->where('result','WON')->count();
	}

	public function titles($sport)
	{
		return $this->matchupsBySport()->get($sport)->where('match.round.id',1)->where('result','WON')->count();
	}
 
	public function roundExit()
	{
		//$events = $this->matchupsByEvent();
		$events = $this->events()->first()->participantExitRound($this->participant);

		return $events;
	}


//	public function getRouteKeyName()
//	{
//		return 'name';
	//	}

	public function dateOfBirth()
	{
		return Carbon::createFromFormat('Y-m-d',$this->dob)->toFormattedDateString();
	}

	public function age()
	{
		$dob = Carbon::createFromFormat('Y-m-d',$this->dob);
		return Carbon::now()->diffInYears($dob);
	}
	
	public function getFemalePlayers()
	{
		return $this::with('participant')->where('gender',0)->get();
	}

	public function getMalePlayers()
	{
		return $this::with('participant')->where('gender',1)->get();
	}

}
