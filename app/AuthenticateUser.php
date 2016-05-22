<?php namespace App;

use Laravel\Socialite\Contracts\Factory as Socialite;
//use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use App\User;


class AuthenticateUser{
	private $socialite;
	private $users;
	public function __construct(User $users,Socialite $socialite)
	{
		$this->users =$users;
		$this->socialite =$socialite;
		
	}

	public function execute($hasCode)
	{
		if (! $hasCode)
			return $this->getAuthorizationFirst();

		$user = $this->users->findByEmail($this->getFacebookUser());
		\Auth::login($user, true);

		//$this->users->login($user, true);
		return redirect('/profile');
		//dd($user);
	}

	private function getAuthorizationFirst()
	{
		return $this->socialite->driver('facebook')->redirect();
	}

	private function getFacebookUser()
	{
		return $this->socialite->driver('facebook')->user();
	}					
}