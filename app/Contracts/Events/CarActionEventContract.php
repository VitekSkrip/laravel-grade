<?php

namespace App\Contracts\Events;

use App\Models\Car;

interface CarActionEventContract
{
    public function car(): Car;
}
