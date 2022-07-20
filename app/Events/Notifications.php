<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Notifications implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public string $body;
    public  $userId;
    public  $image;
    public function __construct($body,$userId,$image)
    {
        $this->body = $body;
        $this->userId = $userId;
        $this->image = $image;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notifications_'. $this->userId);
    }
    public function broadcastAs()
    {
        return ('Notifications');
    }
    public function broadcastWith()
    {
        return [
            'body'=>$this->body,
            'image'=>$this->image
        ];
    }

}
