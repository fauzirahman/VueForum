<?php

namespace App\Listener;

use App\Events\LikeEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LikeEventsListener
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
     * @param  LikeEvents  $event
     * @return void
     */
    public function handle(LikeEvents $event)
    {
        //
    }
}
