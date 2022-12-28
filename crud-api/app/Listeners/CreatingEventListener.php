<?php

namespace App\Listeners;

use App\Events\CreatingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreatedEventEmail;

class CreatingEventListener
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
    public function handle($event)
    {
        // dd($event);
        // Mail::to('papejer858@gmail.com')->send(new CreatedEventEmail());
        Mail::to($event->email)->send(new CreatedEventEmail());
    }
}
