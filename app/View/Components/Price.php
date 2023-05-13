<?php

namespace App\View\Components;

use App\Services\PriceFormatter;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Price extends Component
{
    public function __construct(public readonly int $price, private readonly PriceFormatter $priceFormatter)
    {
    }

    public function render(): View|string|Closure
    {
        return view('components.panels.price');
    }

    public function formattedPrice(): string
    {
        return $this->priceFormatter->format($this->price);
    }
}
