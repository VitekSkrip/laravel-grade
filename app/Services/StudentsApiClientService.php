<?php

namespace App\Services;

use App\Contracts\Services\StudentsApiClientServiceContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class StudentsApiClientService implements StudentsApiClientServiceContract
{
    public function __construct(
        private string $baseUrl,
        private string $login,
        private string $password
    ) {
    }

    private function getClient(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)->withBasicAuth($this->login, $this->password);
    }

    public function findAllSalons(): array
    {
        return $this->getClient()->get('/salons')->throw()->json();
    }

    public function findSomeRandomsSalons(int $limit, bool $isRandom): array
    {
        $data = [
            'limit' => $limit,
            'in_random_order' => $isRandom ? '' : false,
        ];

        return $this->getClient()->get('/salons?' . http_build_query($data))->throw()->json();
    }

    public function orderPayment(int $order_number, int $total_cost): string
    {
        $data = [
            'order_number' => $order_number,
            'total_cost' => $total_cost
        ];

        return $this->getClient()->post('/order_payment', $data)->throw()->body();
    }
}
