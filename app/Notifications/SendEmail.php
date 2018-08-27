<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendEmail extends Notification
{
    use Queueable;

public $fullname;
public $email;
public $userpassword;
public $governor;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($fullname,$email,$userpassword,$governor)
    {
        $this->fullname = $fullname;
          $this->email = $email;
            $this->userpassword = $userpassword;
              $this->governor = $governor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view('sendemail',['fullname'=>$this->fullname,'email'=>$this->email,'userpassword'=>$this->userpassword,'governor'=>$this->governor]);
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
        ];
    }
}
