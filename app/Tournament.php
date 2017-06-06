<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{

	public function sport()
	{
		return $this->belongsTo(Sport::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function seasons()
	{
		return $this->hasMany(Season::class);
	}

	public static function search($data)
	{
		return static::where('name','like',$data)->get();
	}
}
