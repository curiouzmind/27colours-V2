<?php namespace App;

use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;


class AuthenticateUser {
	private $socialite;
	private $auth;
	private $users;
	public function __construct(User $users,Socialite $socialite, Authenticatable $auth)
	{
		$this->users =$users;
		$this->socialite =$socialite;
		$this->auth =$auth;
		
	}

	public function execute($hasCode)
	{
		if (! $hasCode)
			return $this->getAuthorizationFirst();

		$user = $this->users->findByEmail($this->getFacebookUser());
		\Auth::login($user, true);
		//$this->auth->login($user, true);
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