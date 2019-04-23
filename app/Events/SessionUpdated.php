<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;

class SessionUpdated extends Broadcastable
{
    public $session;

    /**
     * Create a new session instance.
     *
     * @param $session
     */
    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * Get the channels the session should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('session.' . $this->session->id);
    }
}
