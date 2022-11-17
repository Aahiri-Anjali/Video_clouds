<?php

namespace App\Listeners;

use App\Events\Loggedin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Models\Login_History;

class LoginHistory
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
     * @param  \App\Events\Loggedin  $event
     * @return void
     */
    public function handle(Loggedin $event)
    {
        $userdetails = $event->user;
        // dd($userdetails);
        $login_history = Login_History::create(['name'=> $userdetails->name,
                                                'email'=> $userdetails->email
                                                ]);
        return $login_history;
    }
}
