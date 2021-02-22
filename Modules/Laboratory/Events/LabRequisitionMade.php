<?php

namespace Modules\Laboratory\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LabRequisitionMade implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;

    public $message;
        
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->username = $username;
        $this->message  = "{$username} liked your status";
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['status-liked'];
    }
}
