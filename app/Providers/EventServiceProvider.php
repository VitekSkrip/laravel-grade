<?php

namespace App\Providers;

use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;
use App\Events\CarCreatedEvent;
use App\Listeners\LogArticleActionSubscriber;
use App\Listeners\LogCarActionSubscriber;
use App\Listeners\SendArticleActionNotificationsSubscriber;
use App\Listeners\SendCarActionNotificationSubscriber;
use App\Listeners\SendMailOnArticleDeletedListener;
use App\Listeners\SendMailOnArticleUpdatedListener;
use App\Listeners\SendMailOnNewArticleCreatedListener;
use App\Listeners\SendMailOnNewCarCreatedListener;
use App\Models\Image;
use App\Observers\ImageObserver;
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
        ArticleCreatedEvent::class => [
            SendMailOnNewArticleCreatedListener::class,
        ],
        ArticleUpdatedEvent::class => [
            SendMailOnArticleUpdatedListener::class,
        ],
        ArticleDeletedEvent::class => [
            SendMailOnArticleDeletedListener::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CarCreatedEvent::class => [
            SendMailOnNewCarCreatedListener::class,
        ],
    ];

    protected $subscribe = [
        LogCarActionSubscriber::class,
        LogArticleActionSubscriber::class,
        SendArticleActionNotificationsSubscriber::class,
        SendCarActionNotificationSubscriber::class,
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Image::observe(ImageObserver::class);
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
