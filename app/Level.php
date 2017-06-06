<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	public function events()
	{
		return $this->hasMany(Event::class);
	}
}
