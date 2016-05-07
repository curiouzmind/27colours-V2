<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
       // \DB::beginTransaction();
        $data=[];
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user= $this->create($request->all());
       // dd($user);
        if($user){
            $data = array(
                'username' => $user->username,
                'email'     => $user->email,
                'confirmation_code'=> $user->confirmation_code,
                );
            $this->sendEmail($data);
        } 
  
        \Session::flash('flash_reg','Thank you for registering.Please check 
            your email account to activate your 27colours Profile before uploading your pics/songs/videos.');
         return redirect('/login');
        //Auth::guard($this->getGuard())->login($this->create($request->all()));
        //return redirect($this->redirectPath());
    }

    public function createConfirmationCode()
    {
        $confirmation_code = str_random(40);
        return $confirmation_code;
    }

    public function sendEmail(array $data)
    {
        \Mail::send('emails.activate', ['confirmation_code' => $data['confirmation_code'], 'data'=>$data], function($message) use ($data) {
                $message->to($data['email'], $data['username'])
                        ->from('support@27colours.com')
                    ->subject('27colours: Verify your email address');
            });

    }

     public function activateAccount($code, User $user)
    {

        if($user->accountIsActive($code)) {

            \Session::flash('flash_activate', 'Success, your account has been activated.');
            return redirect('/profile');

        }

        \Session::flash('message', 'Your account couldn\'t be activated, please try again');
        return redirect('/');
    }


}
