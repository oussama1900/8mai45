<?php

namespace App\Events;
use App\Message;
use App\User;
use App\Scout;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessagePosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Message details
     *
     * @var Message
     */
    public $message;
    /**
     * User that sent the message
     *
     * @var User
     */
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    /**
     * @var
     */
    public $scout;
    private $image;

    /**
     * MessagePosted constructor.
     * @param $image
     * @param Message $message
     */
    public function __construct(  Message $message,Scout $scout)
    {
        //
        $this->message=$message;

      $this->scout=$scout;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chatroom');
    }
}
