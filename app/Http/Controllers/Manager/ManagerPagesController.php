<?php

namespace App\Http\Controllers\Manager;

use App\Contracts\Repositories\CallbacksRepositoryContract;
use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Repositories\TestDrivesRepositoryContract;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ManagerPagesController extends Controller
{
    public function manager(
        OrdersRepositoryContract $ordersRepository,
        CallbacksRepositoryContract $callbacksRepository,
        TestDrivesRepositoryContract $testDrivesRepository
    ): View {
        $orders = $ordersRepository->findAll(['user']);
        $callbacks = $callbacksRepository->findAll();
        $testDrives = $testDrivesRepository->findAll();

        return view('pages.manager.manager-panel', compact('orders', 'callbacks', 'testDrives'));
    }
}
