<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegistrationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminViaSlack
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
    public function handle(NewCustomerHasRegistrationEvent $event)
    {
//        sleep(1000);
        dump('slack message here');
    }
}
