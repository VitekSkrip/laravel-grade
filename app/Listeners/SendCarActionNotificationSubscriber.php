<?php

namespace App\Listeners;

use App\Contracts\Events\CarActionEventContract;
use App\Events\CarCreatedEvent;
use App\Events\CarDeletedEvent;
use App\Events\CarUpdatedEvent;
use App\Models\User;
use App\Notifications\MyCarActionNotification;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;

class SendCarActionNotificationSubscriber
{
    private function notify(string $action, CarActionEventContract $event): void
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user) {
            return;
        }

        $user->notify(new MyCarActionNotification($event->car(), $action));
    }

    public function created(CarCreatedEvent $event): void
    {
        $this->notify('создана', $event);
    }

    public function updated(CarUpdatedEvent $event): void
    {
        $this->notify('обновлена', $event);
    }

    public function deleted(CarDeletedEvent $event): void
    {
        $this->notify('удалена', $event);
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            CarCreatedEvent::class => 'created',
            CarUpdatedEvent::class => 'updated',
            CarDeletedEvent::class => 'deleted',
        ];
    }
}
