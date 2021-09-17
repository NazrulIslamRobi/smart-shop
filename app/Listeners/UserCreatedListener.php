<?php

namespace App\Listeners;


use App\Notifications\VerifyEmail as NotificationsVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserCreatedListener 
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
       
        
        $event->user->notify(new NotificationsVerifyEmail($event->user));
       
 //   Mail::to($user->email)->send( new VerifyEmail($user) );
       
        

    }
}
