<?php

namespace App\Providers;

use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Services\CarRemoverServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\MessageLimiterContract;
use App\Contracts\Services\RolesServiceContract;
use App\Contracts\Services\UserNotificationServiceContract;
use App\Contracts\Services\UserOrdersServiceContract;
use App\Services\CarsService;
use App\Contracts\Services\CreateArticleServiceContract;
use App\Contracts\Services\StudentsApiClientServiceContract;
use App\Contracts\Services\TagsSynchronizerServiceContract;
use App\Contracts\Services\UpdateArticleServiceContract;
use App\Services\CatalogDataCollectorService;
use App\Services\CreateArticleService;
use App\Services\FlashMessage;
use App\Services\ImagesService;
use App\Services\UserOrdersService;
use Faker\Generator;
use App\Services\RolesService;
use App\Services\StudentsApiClientService;
use App\Services\TagsSynchronizerService;
use App\Services\UpdateArticleService;
use App\Services\UserNotificationService;
use Faker\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;
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

        $this->app->singleton(StudentsApiClientServiceContract::class, function () {
            return $this->app->make(
                StudentsApiClientService::class, [
                    'baseUrl' => config('services.studentsApi.url'),
                    'login' => config('services.studentsApi.login'),
                    'password' => config('services.studentsApi.password')
            ]);
        });

        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create(config('app.faker_locale', 'en_US'));
            $faker->addProvider(new FakerImageProvider($faker));

            return $faker;
        });



        $this->app->singleton(FlashMessageContract::class, FlashMessage::class);
        $this->app->singleton(CatalogDataCollectorServiceContract::class, CatalogDataCollectorService::class);
        $this->app->singleton(TagsSynchronizerServiceContract::class, TagsSynchronizerService::class);
        $this->app->singleton(RolesServiceContract::class, RolesService::class);
        $this->app->singleton(ImagesServiceContract::class, function () {
            return $this->app->make(ImagesService::class, ['disk' => 'public']);
        });

        $this->app->singleton(MessageLimiterContract::class, fn () =>
        new class implements MessageLimiterContract {
            public function limit(string $message, int $limit = 20, string $end = '...'): string
            {
                return $message;
            }
        });

        $this->app->singleton(CarCreationServiceContract::class, CarsService::class);
        $this->app->singleton(CarUpdateServiceContract::class, CarsService::class);
        $this->app->singleton(CarRemoverServiceContract::class, CarsService::class);

        $this->app->singleton(FlashMessage::class, fn () => new FlashMessage($this->app->make(MessageLimiterContract::class), session()));

        $this->app->singleton(UserNotificationServiceContract::class, UserNotificationService::class);
        $this->app->singleton(UserOrdersServiceContract::class, UserOrdersService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('trim', fn (int $limit = 100) => $this->map(fn ($value) => Str::limit($value, $limit)));

        Blade::if('admin', fn () => Gate::allows('admin'));

        Blade::directive('date', function ($expression) {
            return "<?php echo ($expression)->format('d M Y'); ?>";
        });
    }
}
