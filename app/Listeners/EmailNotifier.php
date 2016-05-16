<?php

namespace App\Listeners;

use App\Events\UserWasBanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotifier
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        dd(sprintf('Notify %s of this event', $event->user->name));
    }
}
