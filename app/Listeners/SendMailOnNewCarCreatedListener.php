<?php

namespace App\Listeners;

use App\Events\CarCreatedEvent;
use App\Mail\NewCarCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnNewCarCreatedListener
{
    public function handle(CarCreatedEvent $event): void
    {
        Mail::to(config('mail.from.address'))->send(new NewCarCreatedMail($event->car()));
    }
}
