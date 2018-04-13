<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    protected $guarded = [];
    
	public function replies()
	{
		return $this->hasMany(Reply::class);
	}

	public function creator()
	{
		return $this->belongsTo(\App\User::class, 'user_id');
	}

    public function path()
    {
    	return 'threads/'.$this->id;
    }

    public function creatorName()
    {
    	return $this->creator->name;
    }

    public function addReply($reply)
    {
    	$this->replies()->create($reply);
    }
}
