<?php

namespace App\Listeners;

use App\Events\ArticleUpdatedEvent;
use App\Mail\ArticleUpdatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnArticleUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticleUpdatedEvent $event): void
    {
        Mail::to(config('mail.from.address'))->send(new ArticleUpdatedMail($event->article));
    }
}
