<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Services\Mailers\UserMailer;

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

    public function findByEmail($userData)
    {
        $mailer=new UserMailer();
        dd($userData);
        $user=User::where('email',$userData->email)->first();
       // dd($user);
        if($user)
        {
            if($userData->nickname)
            {
                $user->username=$userData->nickname;
            }
            if ($userData->avatar)
            {
                $pic = new ProfilePhoto();
                $pic->image=$userData->avatar;
                $user->profilePhoto()->save($pic);
             }
             if( ! $user->confirmed)
             {
                $user->confirmed=1;
                $mailer->facebookWelcome($user);
             }
            $user->save();

            return $user;

        }
        else{
              if( ! isset($userData->email))
                 {
                    \Session::flash('notice', 'Your email is not set in Facebook, please register by providing your email and password below.');
                    return redirect('/register');
                 }

            $user2= User::firstOrCreate([
                 'username'=> isset($userData->nickname) ? $userData->nickname : 'Newbie',
                 'email' =>$userData->email,
            ]);
            if ($userData->avatar)
            {

                $picc = new ProfilePhoto();
                $picc->image=$userData->avatar;
                $user2->profilePhoto()->save($picc);
                $user2->save();
            }

                    $user2->confirmed=1;
                    $mailer->facebookWelcome($user2);
            return $user2;
        }
    }
}
