<?php
namespace App\Services\Mailers;

//use Illuminate\Contracts\Auth\StatefulGuard as Authenticate;
use Illuminate\Contracts\Auth\Guard;

class UserMailer extends Mailer
{
    protected $user;
    protected $auth;
    protected $guard;
    
  //  function __construct()
  //  {
   //     $this->user = \Auth::user();
       // $this->guard =$guard;
   // }
    
    public function subscribed()
    {
        $subject    = 'Welcome to the site!';
        $view       = 'emails.user.subscribed';
        $data       = ['enter view data here'];
       // $this->emailTo($this->user, $view, $data, $subject);
    }
    
    public function upgraded()
    {
        $subject    = 'Membership upgraded!';
        $view       = 'emails.user.upgraded';
        $data       = ['enter view data here'];
       // $this->emailTo($this->user, $view, $data, $subject);
    }

    public function facebookWelcome($user)
    {
        $subject ='Thank you for registering with 27colours';
        $sender  ='support@27colours.com';
        $view    ='emails.facebookWelcome';
        $data    =['username'=> $user->username];
        $this->emailTo($user, $view, $data, $subject,$sender);
    }
    
}