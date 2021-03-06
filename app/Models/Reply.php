<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $guarded = [];
	
    public function owner()
    {
    	return $this->belongsTo(\App\User::class, 'user_id');
    }
}
