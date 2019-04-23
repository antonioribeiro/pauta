<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;

class SessionsChanged extends Broadcastable
{
    /**
     * Get the channels the congressman should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('sessions');
    }
}
