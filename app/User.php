<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Services\Mailers\UserMailer;
use App\AuthenticateUser;

class User extends Authenticatable
{
     protected $table = 'users';
     public $sessionValue=null;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','confirmation_code','gender','first_name',
        'last_name','facebookID','facebook'
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

    public function likes()
    {
        return $this->hasMany('App\Like');
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

    public function updateCreateUser($userData)
    {   
        //dd($userData->user['first_name']);
         // dd($user);
        // dd($userData);
        $mailer=new UserMailer();
        $user = User::where('email',$userData->email)->first();
        //dd($user);
        if( $user )
        {

            $oldUser=$this->updateUser($user,$userData);
            return $oldUser;
    
                
               // \Auth::login($user, true);
                // session()->flash('alert','You logged with Facebook');
                // session()->flash('alert_type','alert-success');
                return redirect('/profile');
        }
        else{
              if( ! isset($userData->email) || ! $userData->user['verified'])
                 {
                    \Session::flash('error', 'Your email is not set/verified in Facebook, please register by providing your email and password below.');
                    return redirect('register');
                 }

                $user2= $this->creatNewUser($userData); 
                $user2->confirmed=1;          
                $user2->save();
                $mailer->facebookWelcome($user2);
            return $user2;
        }
    }


    public function updateUser($user, $userData)
    {
        if(isset($userData->nickname))
            {
                $user->username=$userData->nickname;
            }

            if(isset($userData->user['first_name']))
            {
                $user->first_name=$userData->user['first_name'];
            }

             if(isset($userData->user['last_name']))
            {
                $user->last_name=$userData->user['last_name'];
            }

            if(isset($userData->user['gender']))
            {
                $user->gender= $userData->user['gender'];
                
            }
            if(isset($userData->user['link']))
            {
                $user->facebook=$userData->user['link'];
            }

            if(isset($userData->id))
            {
                $user->facebookID= $userData->id;

            }


            if (isset($userData->avatar))
            {
                $pic = new ProfilePhoto();
                $pic->image=$userData->avatar;
                $user->profilePhoto()->save($pic);

             }
             if(!isset($user->confirmed))
             {
                $mailer->facebookWelcome($user);
                 $user->confirmed=1;
             }
             $user->sessionValue='You logged in with Facebook';
                $user->save();
             return $user;
    }

    public function creatNewUser($userData)
    {
        $newUser=User::firstOrCreate([
                 'username'=> isset($userData->nickname) ? $userData->nickname : $userData->user['first_name'],
                 'email' =>$userData->email,
                 'first_name'=>$userData->user['first_name'],
                 'last_name'=>$userData->user['last_name'],
                 'gender'=>$userData->user['gender'],
                 'facebook'=>$userData->user['link'],
                 'facebookID'=>$userData->id
            ]);

            if ($userData->avatar)
            {

                $picc = new ProfilePhoto();
                $picc->image=$userData->avatar;
                $newUser->profilePhoto()->save($picc);                
            }

            return $newUser;

    }
}
