<?php

namespace App\Providers\App\Listeners;

use App\Events\NewCustomerHasRegistrationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCustomerListener
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
     * @param  NewCustomerHasRegistrationEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegistrationEvent $event)
    {
        //
    }
}
