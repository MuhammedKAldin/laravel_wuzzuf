<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PusherBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $receiver;
    public string $message;
    public int $sender_id;
    public string $sender_avatar;

    /**
     * Create a new event instance.
     */
    public function __construct(User $receiver, string $message, int $sender_id, string $sender_avatar)
    {
        $this->receiver = $receiver;
        $this->message = $message;
        $this->sender_id = $sender_id;
        $this->sender_avatar = $sender_avatar;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat'.$this->receiver->id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'chatMessage';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
            'sender_id' => $this->sender_id,
            'sender_avatar' => $this->sender_avatar
        ];
    }
}