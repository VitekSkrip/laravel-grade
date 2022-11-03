<?php

namespace App\Providers;

use App\Contracts\Repositories\ArticlesRepositoryContract;
use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\TagsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;

use App\Repositories\CarsRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\TagsRepository;
use App\Repositories\CategoriesRepository;


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
