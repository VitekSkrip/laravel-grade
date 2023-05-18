<?php

namespace App\Repositories;

use App\Contracts\Repositories\SalonsRepositoryContract;
use App\Models\Salon;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class DatabaseSalonsRepistory implements SalonsRepositoryContract
{
    use FlushesCache;

    public function __construct(private readonly Salon $salon)
    {
    }

    private function getModel(): Salon
    {
        return $this->salon;
    }

    public function findAll(): Collection
    {
        return Cache::tags($this->cacheTags())->remember('salons', Carbon::now()->addHours(1), function () {
            return $this->getModel()->distinct('image')->get();
        });
    }

    public function findSomeRandoms(int $limit, bool $isRandom): Collection
    {
        return Cache::tags($this->cacheTags())->remember('salons|' . serialize(['limit' => $limit, 'isRandom' => $isRandom]), Carbon::now()->addMinutes(5), function () use ($limit, $isRandom) {
            return $this->getModel()->when($isRandom, function ($q, $limit) {
                return $q->inRandomOrder();
            })->distinct('image')->take($limit)->get();
        });
    }

    protected function cacheTags(): array
    {
        return ['api-salons'];
    }
}
