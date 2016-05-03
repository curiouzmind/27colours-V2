<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profiles()
    {
    return $this->hasMany('App\Profile');
    }

    public function profilePhoto()
    {
        return $this->hasOne('App\ProfilePhoto');
    }
    
    public function songs()
    {
    return $this->hasMany('App\Song');
    }
    public function videos()
    {
    return $this->hasMany('App\Video');
    }
    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }
    
    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getTimeagoAttribute()
    {
        $date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
        return $date;
    }

    public function scopeConfirmed($query)
    {
        return $query->where('confirmed', 1);
    }

    public function accountIsActive($code)
    {
        $user = User::where('confirmation_code', '=', $code)->first();
        $user->confirmed = 1;
        $user->confirmation_code = null;
        if($user->save()) {
        \Auth::login($user);
        }
        return true;
    }
}
