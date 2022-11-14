<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;
use App\Models\Banner;

interface BannersRepositoryContract
{
    public function getBanners(int $count): Collection;
}
