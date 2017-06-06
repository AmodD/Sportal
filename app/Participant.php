<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
	public function participantable()
	{
		return $this->morphTo();
	}

	public function matches()
	{
		return $this->hasManyThrough(Match::class,Matchup::class);
	}

	public function matchups()
	{
		return $this->hasMany(Matchup::class);
	}

	public function player()
	{
		return $this->belongsTo(Player::class);
	}

	public function team()
	{
		return $this->belongsTo(Team::class);
	}

	public function events()
	{
		return $this->belongsToMany(Event::class);
	}



}
