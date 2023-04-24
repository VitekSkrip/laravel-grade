<?php

namespace App\Notifications;

use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class MyCarActionNotification extends Notification
{
    use Queueable;

    public function __construct(public readonly Car $car, public readonly string $action)
    {
    }

    public function via($notifiable): array
    {
        return ['mail', 'database', 'telegram'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->line('Машина ' . $this->car->name . ' ' . $this->action)
            ->action('Посмотреть', route('product', ['product' => $this->car]))
        ;
    }

    public function toTelegram($notifiable): TelegramMessage
    {
        return (new TelegramMessage())
            ->line('Машина ' . $this->car->name . ' ' . $this->action)
            ->button('Посмотреть', route('product', ['product' => $this->car]))
            ;
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => 'Машина ' . $this->car->name . ' ' . $this->action,
            'url' => route('product', ['product' => $this->car]),
        ];
    }
}
