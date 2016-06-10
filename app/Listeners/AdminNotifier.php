<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\Mailers\UserMailer;
use App\User;

class AdminNotifier implements ShouldQueue
{
    protected $userID;
    protected $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer= $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {

        $user= User::where('id',$event->userID)->first();
        $this->mailer->informAdmin($user);

    }
}
