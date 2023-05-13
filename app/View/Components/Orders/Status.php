<?php

namespace App\View\Components\Orders;

use App\Enums\OrderPaymentStatus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Status extends Component
{
    public function __construct(
        public readonly string $status,
    ) {
    }

    public function render(): View|string|Closure
    {
        return view('components.orders.status');
    }

    public function statusStyle(): string
    {
        return match($this->status) {
            OrderPaymentStatus::NOT_PAID->value => 'bg-orange',
            OrderPaymentStatus::PAID->value => 'bg-green-500',
            OrderPaymentStatus::PAYMENT_ERROR->value => 'bg-red-500'
        };
    }
}
