<?php
namespace App\Services\Mailers;

class UserMailer extends Mailer
{
    protected $user;
    
    function __construct()
    {
        $this->user = \Auth::user();
    }
    
    public function subscribed()
    {
        $subject    = 'Welcome to the site!';
        $view       = 'emails.user.subscribed';
        $data       = ['enter view data here'];
        $this->emailTo($this->user, $view, $data, $subject);
    }
    
    public function upgraded()
    {
        $subject    = 'Membership upgraded!';
        $view       = 'emails.user.upgraded';
        $data       = ['enter view data here'];
        $this->emailTo($this->user, $view, $data, $subject);
    }

    public function facebookWelcome()
    {
        $subject ='Thank you for registering with 27colours';
        $from    ='support@27colours.com';
        $view    ='emails.facebookWelcome';
        $data    =['username'=>isset($this->user->username) ? $this->user->username :
                     'New talent'];
        $this->emailTo($this->user, $view, $data, $subject, $from);
    }
    
}