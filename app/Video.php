<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
   protected $fillable=['title','description','video','video_type','image','youtube'];
	protected $table = 'videos';

     public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
    
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
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

    public function getYoutube($url)
	{
    	if (strpos( $url,"v=") !== false)
    	{
        return substr($url, strpos($url, "v=") + 2, 11);
    	}
    	elseif(strpos( $url,"embed/") !== false)
    	{
        return substr($url, strpos($url, "embed/") + 6, 11);
    	}

  }

  public function setTitleAttribute($value)
     {
       $this->attributes['title'] = $value;

      if (! $this->exists) {
      $this->attributes['slug'] = str_slug($value);
         }
    }
}
