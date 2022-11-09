<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BannersRepository implements BannersRepositoryContract
{
    use FlushesCache;

    public function __construct(private Banner $model)
    {
        
    }

    protected function cacheTags(): array
    {
        return ['banners'];
    }

    private function getModel(): Banner
    {
        return $this->model;
    }

    public function getBanners(int $count): Collection
    {
        return Cache::tags(['banners', 'images'])->remember('homePageBanners|$count', Carbon::now()->addHours(1), fn () => 
            $this->getModel()->with('image')->limit($count)->get()
        );
    }
}
