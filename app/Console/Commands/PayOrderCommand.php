<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Services\StudentsApiClientServiceContract;
use App\Enums\OrderPaymentStatus;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;

class PayOrderCommand extends Command
{
    protected $signature = 'order:pay';

    protected $description = 'Start payment for order';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(OrdersRepositoryContract $ordersRepository, StudentsApiClientServiceContract $studentsApiClient)
    {
        $orders = $ordersRepository->findWhichNotPaid()->take(5);

        foreach ($orders as $order) {
            $this->paymentProcess($order, $studentsApiClient, $ordersRepository);
        }

        return Command::SUCCESS;

    }

    private function paymentProcess(
        Order $order,
        StudentsApiClientServiceContract $studentsApiClient,
        OrdersRepositoryContract $ordersRepository
    ) {
        try {
            $result = $studentsApiClient->orderPayment($order->id, $order->total_cost);
            $ordersRepository->updateStatus($order->id, OrderPaymentStatus::CHECKED);
        } catch (RequestException $exception) {
            $ordersRepository->updateStatus($order->id, OrderPaymentStatus::PAYMENT_ERROR);
        }
    }
}
