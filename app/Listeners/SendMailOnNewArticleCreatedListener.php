<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use App\Mail\NewArticleCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnNewArticleCreatedListener
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
    public function handle(ArticleCreatedEvent $event): void
    {
        Mail::to(config('mail.from.address'))->send(new NewArticleCreatedMail($event->article));
    }
}
