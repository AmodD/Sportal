<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
	public function events()
	{
		return $this->hasMany(Event::class);
	}

	public function sport()
	{
		return $this->belongsTo(Sport::class);
	}
	

	public static function search($data)
	{
		return static::where('description',$data)->get();
	}
}
