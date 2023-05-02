<?php

namespace App\Http\Controllers\Manager;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\OrdersServiceContract;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ManagerPagesController extends Controller
{
    public function manager(OrdersRepositoryContract $ordersRepository): View
    {
        $orders = $ordersRepository->findAll();
        return view('pages.manager.manager-panel', compact('orders'));
    }
}
