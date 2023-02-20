<?php

namespace App\Listeners;

use App\Events\ReportGeneratedEvent;
use App\Mail\ReportGeneratedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class SendMailOnReportGeneratedMailListener
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
    public function handle(ReportGeneratedEvent $event): void
    {
        Mail::to(\Illuminate\Support\Facades\Request::user()->email)->send(new ReportGeneratedMail($event));
    }
}
