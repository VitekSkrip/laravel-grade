<?php

namespace App\Notifications;

use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MyCarActionNotification extends Notification
{
    use Queueable;

    public function __construct(public readonly Car $car, public readonly string $action)
    {
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->line('Машина ' . $this->car->name . ' ' . $this->action)
            ->action('Посмотреть', route('product', ['car' => $this->car]))
        ;
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => 'Машина ' . $this->car->name . ' ' . $this->action,
            'url' => route('product', ['car' => $this->car]),
        ];
    }
}
