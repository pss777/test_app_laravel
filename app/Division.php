<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
	public function workers()
	{
		return $this->belongsToMany('App\Worker');
	}
}
