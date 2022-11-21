<?php

namespace App\Listeners;

use App\Events\ArticleDeletedEvent;
use App\Mail\ArticleDeletedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnArticleDeletedListener
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
    public function handle(ArticleDeletedEvent $event): void
    {
        Mail::to(config('mail.from.address'))->send(new ArticleDeletedMail($event->slug));
    }
}
