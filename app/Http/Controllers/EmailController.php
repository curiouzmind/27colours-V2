<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmailController extends Controller
{
    public function sendTest()
    {
    	$title = 'This is moi';
        $content = 'I know what you are talikng about, this text needs to be more, so that it will actually pass through';

        \Mail::send('emails.testing', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('samizares@beazea.com', 'Testing Arrays')
            		->subject('From sammy with Love')
					->to('samizares@gmail.com');

        });
        return 'Message sent successfully';

       // return response()->json(['message' => 'Request completed'])        
	}
}
