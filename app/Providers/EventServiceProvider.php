<?php

namespace App\Providers;

use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;

use App\Listeners\SendMailOnArticleDeletedListener;
use App\Listeners\SendMailOnArticleUpdatedListener;
use App\Listeners\SendMailOnNewArticleCreatedListener;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleCreatedEvent::class => [
            SendMailOnNewArticleCreatedListener::class,
        ],
        ArticleUpdatedEvent::class => [
            SendMailOnArticleUpdatedListener::class,
        ],
        ArticleDeletedEvent::class => [
            SendMailOnArticleDeletedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
