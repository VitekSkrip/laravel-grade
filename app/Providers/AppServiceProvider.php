<?php

namespace App\Providers;

use App\Contracts\Services\CreateArticleServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Services\CreateArticleService;
use App\Services\TagsSynchronizerService;
use App\Services\UpdateArticleService;
use Illuminate\Support\ServiceProvider;
use Faker\Factory;
use Faker\Generator;
use QSchool\FakerImageProvider\FakerImageProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsSynchronizerServiceContract::class, TagsSynchronizerService::class);

        $this->app->singleton(CreateArticleServiceContract::class, CreateArticleService::class);

        $this->app->singleton(UpdateArticleServiceContract::class, UpdateArticleService::class);

        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(config('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));
            
            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
