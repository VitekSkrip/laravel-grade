<?php

namespace App\Repositories;

use App\Contracts\Repositories\SalonsRepositoryContract;
use App\Contracts\Services\StudentsApiClientServiceContract;
use App\DTO\ApiSalonModel;
use Carbon\Carbon;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Request;

class SalonsRepository implements SalonsRepositoryContract
{
    use FlushesCache;

    public function __construct(private StudentsApiClientServiceContract $salonsClientService)
    {

    }

    public function findAll(): Collection
    {
        try {
            return Cache::tags($this->cacheTags())->remember('salons', Carbon::now()->addHours(1), function () {
                $salons = collect();

                foreach($this->salonsClientService->findAllSalons() as $salon) {
                    $salons->push($this->createModelFromResponseItem($salon));
                }

                return $salons;
            });
        } catch (RequestException $exception) {
            return Cache::tags($this->cacheTags())->remember('salons', Carbon::now()->addMinutes(3), fn () => collect());
        }
    }

    public function findSomeRandoms(int $limit, bool $isRandom): Collection
    {
        try {
            return Cache::tags($this->cacheTags())->remember('salons|' . serialize(['limit' => $limit, 'isRandom' => $isRandom]), Carbon::now()->addMinutes(5), function () use ($limit, $isRandom) {
                $salons = collect();

                foreach($this->salonsClientService->findSomeRandomsSalons($limit, $isRandom) as $salon) {
                    $salons->push($this->createModelFromResponseItem($salon));
                }

                return $salons;
            });
        } catch (RequestException $exception) {
            return Cache::tags($this->cacheTags())->remember('salons', Carbon::now()->addMinutes(3), fn () => collect());
        }
    }

    private function createModelFromResponseItem(array $salon): ApiSalonModel
    {
        return new ApiSalonModel(
            $salon['name'],
            $salon['image'],
            $salon['address'],
            $salon['phone'],
            $salon['work_hours'],
        );
    }

    protected function cacheTags(): array
    {
        return ['api-salons'];
    }
}
