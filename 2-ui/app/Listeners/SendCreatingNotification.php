<?php

namespace App\Listeners;

use App\Events\CreatingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
