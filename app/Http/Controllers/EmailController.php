<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\Mailers\UserMailer;

class EmailController extends Controller
{
    protected $mailer;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
     {
        $this->mailer= $mailer;
        $this->middleware(['auth'],['except'=>['sendTest']]);
    }

    public function sendTest()
    {	
        $this->mailer->sentTestActivation();

        return 'Message sent successfully';
    	/*
        $data=[];
    	$data['username']="sammy and bolaji";
        $confirmation_code = str_random(6);

        Mailer::send('emails.activate',['confirmation_code'=> $confirmation_code,'data' =>$data], function ($message)
        {
            $message->from('support@27colours.com', 'Testing Emails')
            		->subject('From sammy with Love')
					->to('samizares@gmail.com');

        });
        return 'Message sent successfully';

       // return response()->json(['message' => 'Request completed']) 
       */       
	}

	public function resendConfirmation(Request $request)
	{
		$email=\Auth::user()->email;
		$data=[];
		$confirmation_code = str_random(40);
		\Mail::send('emails.activate',['confirmation_code'=> $confirmation_code,'data' =>$data], function ($message)
        {
            $message->from('support@27colours.com', 'Resend Confirmation')
            		->subject('Activate your 27colours account')
					->to($email);

        });
			return redirect('/profile');


	}
}
