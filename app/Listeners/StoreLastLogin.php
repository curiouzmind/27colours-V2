<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StoreLastLogin
{
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request= $request;
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $user= User::where('id',$event->userID)->first();
        $user->last_login = Carbon::now();
        $user->last_login_ip = $this->request->getClientIp();
        $user->save();
    }
}
