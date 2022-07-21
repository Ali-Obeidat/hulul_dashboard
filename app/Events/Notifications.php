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
    public string $title;
    public array $body;
    public array $info;
    public  $userId;
    public  $image;
    public function __construct($title, $body, $userId, $image, $info)
    {
        $this->title = $title;
        $this->body = $body;
        $this->userId = $userId;
        $this->image = $image;
        $this->info = $info;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notifications_' . $this->userId);
    }
    public function broadcastAs()
    {
        return ('Notifications');
    }
    public function broadcastWith()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
            'info' => $this->info,
        ];
    }
}
