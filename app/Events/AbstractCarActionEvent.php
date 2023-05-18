<?php

namespace App\Events;

use App\Contracts\Events\CarActionEventContract;
use App\Models\Car;

abstract class AbstractCarActionEvent implements CarActionEventContract
{
    public function __construct(public readonly Car $car)
    {
    }

    public function car(): Car
    {
        return $this->car;
    }
}
