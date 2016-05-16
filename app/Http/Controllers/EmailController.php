<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmailController extends Controller
{
    public function sendTest()
    {	
    	$data=[];
    	$data['username']="sammy3";
        $confirmation_code = str_random(6);

        \Mail::send('emails.activate',['confirmation_code'=> $confirmation_code,'data' =>$data], function ($message)
        {
            $message->from('sammylee@27colours.com', 'Testing Emails')
            		->subject('From sammy with Love')
					->to('samizares@gmail.com');

        });
        return 'Message sent successfully';

       // return response()->json(['message' => 'Request completed'])        
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
