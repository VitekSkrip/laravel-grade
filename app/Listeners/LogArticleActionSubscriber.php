<?php

namespace App\Listeners;

use App\Contracts\Events\ArticleActionEventContract;
use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Log;

class LogArticleActionSubscriber
{
    private function log(string $message, ArticleActionEventContract $event): void
    {
        Log::channel('articlesInfo')->info($message, ['article' => $event->article()->toArray()]);
    }

    public function created(ArticleCreatedEvent $event): void
    {
        $this->log('New article created', $event);
    }

    public function updated(ArticleUpdatedEvent $event): void
    {
        $this->log('Article updated', $event);
    }

    public function deleted(ArticleDeletedEvent $event): void
    {
        $this->log('Article deleted', $event);
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
