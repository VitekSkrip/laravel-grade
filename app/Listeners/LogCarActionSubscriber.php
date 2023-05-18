<?php

namespace App\Listeners;

use App\Contracts\Events\CarActionEventContract;
use App\Events\CarCreatedEvent;
use App\Events\CarDeletedEvent;
use App\Events\CarUpdatedEvent;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Log;

class LogCarActionSubscriber
{
    private function log(string $message, CarActionEventContract $event): void
    {
        Log::channel('carsInfo')->info($message, ['car' => $event->car()->toArray()]);
    }

    public function created(CarCreatedEvent $event): void
    {
        $this->log('New car created', $event);
    }

    public function updated(CarUpdatedEvent $event): void
    {
        $this->log('Car updated', $event);
    }

    public function deleted(CarDeletedEvent $event): void
    {
        $this->log('Car deleted', $event);
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
