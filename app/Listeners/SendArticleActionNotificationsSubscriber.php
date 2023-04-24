<?php

namespace App\Listeners;

use App\Contracts\Events\CarActionEventContract;
use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;
use App\Models\User;
use App\Notifications\MyCarActionNotification;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;

class SendArticleActionNotificationsSubscriber
{
    private function notify(string $action, ArticleActionEventContract $event): void
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user) {
            return;
        }

        $user->notify(new MyArticleActionNotification($event->car(), $action));
    }

    public function created(ArticleCreatedEvent $event): void
    {
        $this->notify('создана', $event);
    }

    public function updated(ArticleUpdatedEvent $event): void
    {
        $this->notify('обновлена', $event);
    }

    public function deleted(ArticleDeletedEvent $event): void
    {
        $this->notify('удалена', $event);
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            ArticleCreatedEvent::class => 'created',
            ArticleUpdatedEvent::class => 'updated',
            ArticleDeletedEvent::class => 'deleted',
        ];
    }
}
