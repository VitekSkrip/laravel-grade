<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class MyArticleActionNotification extends Notification
{
    use Queueable;

    public function __construct(
        public readonly Article $article,
        public readonly string $action
    ) {
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->line('Новость ' . $this->article->title . ' ' . $this->action)
            ->action('Посмотреть', route('articles.show', ['slug' => $this->article->slug]))
            ;
    }

    public function toArray($notifiable): array
    {
        return [
            'message' => 'Новость ' . $this->article->title . ' ' . $this->action,
            'url' => route('articles.show', ['slug' => $this->article->slug]),
        ];
    }
}
