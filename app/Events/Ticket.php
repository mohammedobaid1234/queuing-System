<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Ticket implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ticket;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ticket_id)
    {
        $this->ticket = $ticket_id;
        // $ticket = User::allCookies('service');
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('service-'.$this->ticket);
    }
    public function broadcastWith()
    {
       return  ['ticket_id' => $this->ticket];
    }

    public function broadcastAs()
    {
        return 'ticket';
    }

}
