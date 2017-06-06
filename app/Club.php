<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
	//

	public function teams()
	{
		return $this->hasMany(Team::class);
	}


	public static function search($data)
	{
		return static::where('name','like',$data)->get();
	}
}
