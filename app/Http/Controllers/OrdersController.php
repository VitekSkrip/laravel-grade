<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\OrdersServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function __construct(
        private readonly OrdersServiceContract $userOrdersService
    ) {
    }

    public function store(
        Request $request,
        FlashMessageContract $flashMessage
    ): RedirectResponse {
        $this->userOrdersService->createOrder($request->user(), [
            'total_cost' => $request->total_cost,
            'total_quantity' => $request->total_quantity
        ]);

        $flashMessage->success('Заявка сформирована. Менеджер скоро с Вами свяжется');

        return back();
    }
}
