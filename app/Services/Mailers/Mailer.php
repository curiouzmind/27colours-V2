<?php
namespace App\Services\Mailers;

abstract class Mailer
{
	public function emailTo($person, $view, $data, $subject, $sender)
	{
		\Mail::send($view, $data, function($message) use($person, $subject,$sender)
		{
			$message->to($person->email)
					->subject($subject)
					->from($sender);

		});
	}
}