<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticlesRepositoryContract,
    App\Contracts\Repositories\CarsRepositoryContract,
    App\Contracts\Repositories\TagsRepositoryContract,
    App\Contracts\Repositories\ImagesRepositoryContract,
    App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Repositories\BasketsRepositoryContract;
use App\Contracts\Repositories\CarBodiesRepositoryContract;
use App\Contracts\Repositories\CarClassesRepositoryContract;
use App\Contracts\Repositories\CarEnginesRepositoryContract;
use App\Contracts\Repositories\NotificationsRepositoryContract;
use App\Contracts\Repositories\OrdersRepositoryContract;
use App\Contracts\Repositories\RolesRepositoryContract;
use App\Contracts\Repositories\SalonsRepositoryContract;
use App\Repositories\BasketsRepository;
use App\Repositories\CarBodiesRepository;
use App\Repositories\CarClassesRepository;
use App\Repositories\CarEnginesRepository;
use App\Repositories\CarsRepository,
    App\Repositories\ArticlesRepository,
    App\Repositories\TagsRepository,
    App\Repositories\ImagesRepository,
    App\Repositories\CategoriesRepository;
use App\Repositories\NotificationsRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\RolesRepository;
use App\Repositories\SalonsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CarsRepositoryContract::class, CarsRepository::class);
        $this->app->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
        $this->app->singleton(ImagesRepositoryContract::class, ImagesRepository::class);
        $this->app->singleton(CategoriesRepositoryContract::class, CategoriesRepository::class);
        $this->app->singleton(SalonsRepositoryContract::class, SalonsRepository::class);;
        $this->app->singleton(CarBodiesRepositoryContract::class, CarBodiesRepository::class);
        $this->app->singleton(CarClassesRepositoryContract::class, CarClassesRepository::class);
        $this->app->singleton(CarEnginesRepositoryContract::class, CarEnginesRepository::class);
        $this->app->singleton(RolesRepositoryContract::class, RolesRepository::class);
        $this->app->singleton(NotificationsRepositoryContract::class, NotificationsRepository::class);
        $this->app->singleton(BasketsRepositoryContract::class, BasketsRepository::class);
        $this->app->singleton(OrdersRepositoryContract::class, OrdersRepository::class);
    }
}
