<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //
	public function divisions()
	{
		return $this->belongsToMany('App\Division');
	}
}
