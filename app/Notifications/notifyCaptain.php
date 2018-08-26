<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Carbon\Carbon;
class notifyCaptain extends Notification
{
    use Queueable;

 public $data;
 public $notification_type;
 public $notification_image;
    /**
     * Create a new notification instance.
     *
     * @return void
     */


    public function __construct($message,$type,$notification_image,$event_time)
    {
        $this->data = [$message,$notification_image,$event_time];
        $this->notification_type = $type;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            //


                        'data'=>$this->data,
                        'notificationtype'=>$this->notification_type,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //

            'data'=>$this->data,
            'type'=>$this->notification_type,
        ];
    }
}
