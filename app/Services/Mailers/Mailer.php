<?php
namespace App\Services\Mailers;

abstract class Mailer
{
	public function emailTo($person, $view, $data, $subject,$from)
	{
		\Mail::send($view, $data, function($message) use($person, $subject)
		{
			$message->to($person->email)
					->from($from)
					->subject($subject);

		});
	}
}