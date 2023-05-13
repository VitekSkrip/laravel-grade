<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Services\PriceFormatter;
use Illuminate\Console\Command;

class DisplayCatalogCommand extends Command
{
    protected $signature = 'app:display-models
        {minPrice=0 : Filter by min price}
        {maxPrice=0 : Filter by max price}
        {categories?* : Filter by categories ids}
        {--model= : Filter by name}
        {--orderPrice= : order by price (asc|desc)}
        {--orderModel= : order by name (asc|desc)}
        {--j|json : json output}'
    ;

    protected $description = 'Display catalog models';

    protected $help = '
Display cars with price > 1kk and < 2kk, from categories 1, 2, 3 sorted by price=desc
<info>php artisan app:display-models 1000000 2000000 1 2 3 --orderPrice=desc</info>
';

    public function handle(PriceFormatter $priceFormatter, CarsRepositoryContract $carsRepository): int
    {

        $catalogFilterDTO = (new CatalogFilterDTO())
            ->setModel($this->option('model'))
            ->setMinPrice((int) $this->argument('minPrice'))
            ->setMaxPrice((int) $this->argument('maxPrice'))
            ->setOrderPrice($this->option('orderPrice'))
            ->setOrderModel($this->option('orderModel'))
            ->setAllCategories($this->argument('categories'))
        ;

        $cars = $carsRepository->findForCatalog($catalogFilterDTO, ['id', 'name', 'price', 'old_price']);

        if ($this->option('json')) {
            $this->output->writeln($cars->toJson());
            return Command::SUCCESS;
        }

        $data = array_map(function ($car) use ($priceFormatter) {
            $car['price'] = $car['price'] ? $priceFormatter->format($car['price']) : null;
            $car['old_price'] = $car['old_price'] ? $priceFormatter->format($car['old_price']) : null;
            $car['discount_sum'] = $car['discount_sum'] ? $priceFormatter->format($car['discount_sum']) : null;
            return $car;
        }, $cars->toArray());

        $this->table(['id', 'name', 'price', 'old_price', 'discount_sum'], $data);
        return Command::SUCCESS;
    }
}
