<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $table= 'likes';
	public $timestamps = false;
    
     public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
