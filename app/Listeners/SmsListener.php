<?php

namespace App\Listeners;

use App\Events\SmsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SmsListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        if ($event instanceof SmsEvent) {
            $event->handle();
        }
    }
}
