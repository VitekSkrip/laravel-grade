<?php

namespace App\Repositories;

use App\Contracts\Repositories\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Collection;

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
        return $this->getModel()->limit($count)->get();
    }
}
