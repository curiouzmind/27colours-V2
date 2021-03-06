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
      $data['resource_title']=$song->title;
      $data['liker_username']=$liker->username;
      $data['placeholder']=isset($song->image) ? 'https://27colours.com/'.$song->image : 'https://27colours.com/img/music-avatar-2.PNG';
      $subject= $data['liker_username'] . ' liked your song titled '. $data['resource_title'];
      $sender='info@27colours.com';
      $view='emails.notifications';
      $this->sendNotice($owner,$view,$data,$subject,$sender);

    }

    public function sendLikeVideo($video,$like)
    {
      $data =[];
      $owner=$video->user;
      $liker=User::where('id',$like->user_id)->first();
      $data['owner_username']=$owner->username;
      $data['link']='https://27colours.com/video/show/'.$video->id;
      $data['resource']= 'video';
      $data['resource_title']=$video->title;
      $data['liker_username']=$liker->username;
      $data['placeholder']=isset($video->image) ? 'https://27colours.com/'.$video->image :'https://27colours.com/img/video-player-2.PNG';
      $subject= $data['liker_username'] . ' liked your video titled '. $data['resource_title'];
      $sender='info@27colours.com';
      $view='emails.notifications';
      $this->sendNotice($owner,$view,$data,$subject,$sender);

    }

    public function sendLikeGallery($gallery,$like)
    {
      $data =[];
      $owner=$gallery->user;
      $liker=User::where('id',$like->user_id)->first();
      $data['owner_username']=$owner->username;
      $data['link']='https://27colours.com/gallery/show/'.$gallery->id;
      $data['resource']= 'picture';
      $data['resource_title']=isset($gallery->caption) ? $gallery->caption : 'Your cute photo on 27colours';
      $data['liker_username']=$liker->username;
      $data['placeholder']='https://27colours.com/'.$gallery->image;
      $subject= $data['liker_username'] . ' liked your picture';
      $sender='info@27colours.com';
      $view='emails.notifications';
      $this->sendNotice($owner,$view,$data,$subject,$sender);

    }

    public function informAdmin($user)
    {
      $data=[];
      $data['username']=$user->username;
      $data['profile_link']=url('/profile/show/'.$user->id);
      $data['user_image']=isset($user->profilePhoto) ? $user->profilePhoto->image : asset('img/user.PNG');
      $subject='A new user '.$user->username.' has been registered';
      $view='emails.informAdmins';
      $sender='info@27colours.com';
      $admins=['support@27colous.com','nonso@27colours.com','samizares@27colours.com'];
      $this->sendTo($admins, $view, $data, $subject,$sender);


    }

    public function sendEmail(array $data)
    {
        \Mail::send('emails.activate', ['data'=>$data], function($message) use ($data) {
                $message->to($data['email'], $data['username'])
                        ->from('support@27colours.com')
                    ->subject('27colours: Verify your email address');
            });

    }


    
}