<?php namespace App;

use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Http\Request;
//use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use App\User;


class AuthenticateUser{
	private $socialite;
	private $users;
	public $request;
	public function __construct(User $users,Socialite $socialite, Request $request)
	{
		$this->users =$users;
		$this->socialite =$socialite;
		$this->request=$request;
		
	}

	public function execute($hasCode)
	{
		if (! $hasCode)
			return $this->getAuthorizationFirst($this->request);

		$user = $this->users->findByEmail($this->getSocialUser($this->request));
		\Auth::login($user, true);

		//$this->users->login($user, true);
		return redirect('/profile');
		//dd($user);
	}

	private function getAuthorizationFirst(Request $request)
	{
		return $this->socialite->driver('facebook')->redirect();
	}

	private function getSocialUser(Request $request)
	{
		if($this->request->has('error') =='access_denied'){
          return redirect('login');
        }
		$state = $this->request->get('state');
    	$request->session()->put('state',$state);
    	if(\Auth::check()==false){
          session()->regenerate();
        }
		return  $this->socialite->with('facebook')->user();
		//dd($user2);
	}					
}