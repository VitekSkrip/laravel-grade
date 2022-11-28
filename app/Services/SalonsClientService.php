<?php

namespace App\Services;

use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(private string $baseUrl)
    {

    }

    private function getClient(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)->withBasicAuth('student', 'password');
    }

    public function find(): array
    {
        return $this->getClient()->get('/salons')->json();
    }

    // public function getSomeRandoms(int $limit): array
    // {
    //     $data = [

    //     ];

    //     return $this->getClient()->get('/salong' . $data)->json();
    // }
}
