<?php

namespace App\Http\Controllers;

use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\Orders\OrderCreationServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct(
        private readonly OrderCreationServiceContract $userOrdersService
    ) {
    }

    public function store(
        Request $request,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        $this->userOrdersService->create($request->user(), [
            'total_cost' => $request->total_cost,
            'total_quantity' => $request->total_quantity
        ]);

        $flashMessage->success('Предоплата оформлена. Менеджер скоро с Вами свяжется');

        return back();
    }
}
