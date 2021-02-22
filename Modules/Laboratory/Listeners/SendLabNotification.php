<?php

namespace Modules\Laboratory\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

class SendLabNotification
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
        // $admins = User::whereHas('roles', function ($query) {
        //         $query->where('OID', 1);
        //     })->get();

        // Notification::send($admins, new NewLabRequisition($event->user));
    }
}
