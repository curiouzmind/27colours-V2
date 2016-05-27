<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [];
	protected $table = 'galleries';

	 public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
      
	public static $rules = array(
		'caption'=>'min:6',	
		'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'		
	);
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}
	public function comments()
	{
		return $this->morphMany('Comment','commentable');
	}

	public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }
}