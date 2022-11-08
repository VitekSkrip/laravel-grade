<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BannersRepository implements BannersRepositoryContract
{
    public function __construct(private Banner $model)
    {
        
    }

    private function getModel(): Banner
    {
        return $this->model;
    }

    public function getBanners(int $count): Collection
    {
        return Cache::tags(['banners', 'images'])->remember('homePageBanners|$count', 3600, fn () => 
            $this->getModel()->with('image')->limit($count)->get()
        );
    }
}
