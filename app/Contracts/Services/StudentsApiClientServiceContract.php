<?php

namespace App\Contracts\Services;

interface StudentsApiClientServiceContract
{
    public function findAllSalons(): array;

    public function findSomeRandomsSalons(int $limit, bool $isRandom): array;

    public function orderPayment(int $order_number, int $total_cost): string;
}
