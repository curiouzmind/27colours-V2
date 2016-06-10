<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\AuthenticateUser;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Services\Mailers\UserMailer;
use App\Events\UserRegistered;
use App\Events\UserLoggedIn;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

     protected $mailer;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->mailer= $mailer;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms'  =>  'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => $this->createConfirmationCode(),
        ]);
    }

    /**
     * Register a user.
     *
     * @param Request $request
     * @return registered User
     */

    public function register(Request $request)
    {
        $data=[];
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user= $this->create($request->all());
        if($user){
            $data = array(
                'username' => $user->username,
                'email'     => $user->email,
                'confirmation_code'=> $user->confirmation_code,
                );
            $this->mailer->sendEmail($data);
            event(new UserRegistered($user->id));
        } 
  
        
         return redirect('/login')
                        ->with('flash_reg','Thank you for registering.Please check 
                        your email to activate your account');
        
    }

    public function createConfirmationCode()
    {
        $confirmation_code = str_random(40);
        return $confirmation_code;
    }


    public function facebook(AuthenticateUser $authenticateUser, Request $request)
    {
        return $authenticateUser->execute($request->has('code'));
    }
}