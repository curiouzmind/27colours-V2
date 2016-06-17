<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

     public function activateAccount($code)
    {
        $user= \Auth::user();
        $this->activate($code);

        	 session('alert','something went wrong.');
          	 session('alert_type','alert-warning');
        	 return redirect('/profile');     
    }

    public function activate($code)
    {
        $user = User::where('confirmation_code', '=', $code)->first();
          if($user)
          {
            $user->confirmed = 1;
            $user->confirmation_code = null;
            $user->save();
            session()->flash('alert','your account has been activated.');
          		session()->flash('alert_type','alert-success');
        		 return redirect('/profile');
         }
         else{
         		session()->flash('alert','Sorry,you are already activated');
            	session()->flash('alert_type','alert-danger');
                return redirect('/profile');
              
         }
    }
}
