<?php

namespace App\Services;

use App\Contracts\Services\SalonsClientServiceContract;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    public function __construct(private string $baseUrl, private string $login, private string $password)
    {
        
    }

    private function getClient(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)->withBasicAuth($this->login, $this->password);
    }

    public function findAll(): array
    {
        return $this->getClient()->get('/salons')->throw()->json();
    }

    public function findSomeRandoms(int $limit, bool $isRandom): array
    {
        $data = [
            'limit' => $limit,
            'in_random_order' => $isRandom ? '' : false,  
        ];
        
        return $this->getClient()->get('/salons?' . http_build_query($data))->throw()->json();
    }
}
