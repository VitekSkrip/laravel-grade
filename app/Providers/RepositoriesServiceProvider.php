<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticlesRepositoryContract,
    App\Contracts\Repositories\CarsRepositoryContract,
    App\Contracts\Repositories\TagsRepositoryContract,
    App\Contracts\Repositories\ImagesRepositoryContract,
    App\Contracts\Repositories\CategoriesRepositoryContract;

use App\Repositories\CarsRepository,
    App\Repositories\ArticlesRepository,
    App\Repositories\TagsRepository,
    App\Repositories\ImagesRepository,
    App\Repositories\CategoriesRepository;


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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
