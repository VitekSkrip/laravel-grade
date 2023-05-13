<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BasketController extends Controller
{
    public function __construct(
        private readonly BasketsRepositoryContract $basketsRepositoryContract,
    ) {
    }

    public function show(Request $request): View
    {
        $basketProducts = $this->basketsRepositoryContract->findProducts($request->user()->id);
        $totalCost = $this->basketsRepositoryContract->calculateTotalCost($basketProducts);
        $totalQuantity = $this->basketsRepositoryContract->calculateTotalQuantity($basketProducts);

        return view('pages.basket', compact('basketProducts', 'totalCost', 'totalQuantity'));
    }

    public function addProduct(
        Request $request,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        $this->basketsRepositoryContract->addProduct(
            $request->user()->id,
            $request->product_id
        );

        $flashMessage->success('Модель добавлена в избранное');

        return back();
    }

    public function deleteProduct(Request $request): RedirectResponse
    {
        $this->basketsRepositoryContract->deleteProduct(
            $request->user()->id,
            $request->product_id
        );

        return back();
    }

    public function removeProduct(Request $request): RedirectResponse
    {
        $this->basketsRepositoryContract->removeProduct(
            $request->user()->id,
            $request->product_id
        );

        return back();
    }
}
