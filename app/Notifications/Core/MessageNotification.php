<?php

namespace App\Notifications\Core;

use Illuminate\Notifications\Notification;

class MessageNotification extends Notification
{
    public function __construct(public string $message)
    {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
		return [
			"message"=>$this->message
		];
    }

    public function toArray($notifiable): array
    {
        return [
        	"message"=>$this->message
		];
    }
}
