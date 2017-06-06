<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

	public function sport()
	{
		return $this->belongsTo(Sport::class);
	}

	public function club()
	{
		return $this->belongsTo(Club::class);
	}

	public function players()
	{
		return $this->belongsToMany(Player::class)->withPivot('event_id');
	}

	public function events()
	{
		return $this->belongsToMany(Event::class,'player_team');
	}

	public function participant()
	{
		return $this->morphOne(Participant::class,'participantable');
	}

	public function playerEvents()
	{
		return  $this->events()->where('player_id',$this->pivot->player_id)->get();
	}

	public function matchups()
	{
		return $this->participant->matchups->whereIn('match.event_id',$this->playerEvents()->pluck('id')); 
		
	}

	public function matchesPlayed()
	{
		return $this->matchups()->count();
	}

	public function matchesWon()
	{
		return $this->matchups()->where('result','WON')->count();
	}

	public function titles()
	{
		return $this->matchups()->where('match.round.id',1)->where('result','WON')->count();
	}
	
	public static function search($data)
	{
		return static::where('name','like',$data)->get();
	}

	public function teamEvents()
	{
		return $this->with('participant.events')
			->find($this->id)
			->participant->events()->get();
	}

	public function teamEventPlayers(\App\Event $event)
	{
		return $this->players()->wherePivot('event_id',$event->id)->get();

	}


}
