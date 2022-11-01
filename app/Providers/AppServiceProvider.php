<?php

namespace App\Providers;

use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Services\TagsSynchronizerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoriesServiceProvider::class);
        $this->app->singleton(TagsSynchronizerServiceContract::class, TagsSynchronizerService::class);
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
