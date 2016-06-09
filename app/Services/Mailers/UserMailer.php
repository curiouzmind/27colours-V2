<?php
namespace App\Services\Mailers;

//use Illuminate\Contracts\Auth\StatefulGuard as Authenticate;
use Illuminate\Contracts\Auth\Guard;
use App\User;
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

    public function sendActivation($user, $code)
    {
        $data=[];
        $data['confirmation_code'] = $code;
        $subject ='Activate your 27colours account';
        $sender  ='support@27colours.com';
        $view    ='emails.activate';
        $data['username']= $user->username;
        $this->emailTo($user, $view, $data, $subject,$sender);
    }

    public function sendTestActivation()
    {
      $data=[];
      $data['username']="sammy and bolaji";
      $data['confirmation_code'] = str_random(6);
      $subject ='Testing activation emails';
      $sender= 'support@27colours.com';
      $view ='emails.activate';
      $user=['gbolahanalade@gmail.com','samizares@beazea.com'];
       $this->sendTo($user, $view, $data, $subject,$sender);
    }

    public function sendLikeSong($song,$like)
    {
      $data =[];
      $owner=$song->user;
      $liker=User::where('id',$like->user_id)->first();
      $data['owner_username']=$owner->username;
      $data['link']='https://27colours.com/song/show/'.$song->id;
      $data['resource']= 'song';
      $data['song_title']=$song->title;
      $data['liker_username']=$liker->username;
      //$data['song_image']=isset($song->image) ? $song->image : 'https://27colours.com/img/music-avatar-2.';
      $subject= $data['liker_username'] . ' liked your Song titled '. $data['song_title'];
      $sender='info@27colours.com';
      $view='emails.notifications';
      $this->sendNotice($owner,$view,$data,$subject,$sender);

    }
    
}