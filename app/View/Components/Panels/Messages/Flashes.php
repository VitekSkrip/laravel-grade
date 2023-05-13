<?php

namespace App\View\Components\Panels\Messages;

use App\Contracts\Services\FlashMessageContract;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Flashes extends Component
{
    public function __construct(private readonly FlashMessageContract $flashMessage)
    {
    }

    public function render(): View|string|Closure
    {
        $errors = $this->flashMessage->errorMessages();
        $successes = $this->flashMessage->successMessages();
        return view('components.panels.messages.flashes', ['errors' => $errors, 'successes' => $successes]);
    }
}
