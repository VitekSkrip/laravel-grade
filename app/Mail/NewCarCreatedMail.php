<?php

namespace App\Mail;

use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCarCreatedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public readonly Car $car)
    {
    }

    public function build(): NewCarCreatedMail
    {
        $mail = $this
            ->markdown('mail.new-car-created-mail')
            ->with([
                'url' => route('product', ['product' => $this->car], true),
            ])
            ->attachData('some Text', 'example.txt', ['mime' => 'plain/text'])
        ;

        if ($this->car->image) {
            $mail->attachFromStorageDisk('public', $this->car->image->path);
        }

        return $mail;
    }
}
