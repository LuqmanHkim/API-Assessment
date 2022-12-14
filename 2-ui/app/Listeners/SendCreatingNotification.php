<?php

namespace App\Listeners;

use App\Events\CreatingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreatingEventMail;

class SendCreatingNotification
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
     * @param  \App\Events\CreatingEvent  $event
     * @return void
     */
    public function handle(CreatingEvent $event)
    {
        Mail::to($event->email)->send(new CreatingEventMail());
    }
}
