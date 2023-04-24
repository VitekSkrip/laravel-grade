<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Services\CarRemoverServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Events\CarCreatedEvent;
use App\Events\CarDeletedEvent;
use App\Events\CarUpdatedEvent;
use App\Models\Car;
use Illuminate\Support\Facades\Event;

class CarsService implements CarCreationServiceContract, CarRemoverServiceContract, CarUpdateServiceContract
{
    public function __construct(
        private readonly CarsRepositoryContract $carsRepository,
        private readonly ImagesServiceContract $imagesService
    ) {
    }

    public function create(array $fields, array $categories = []): Car
    {
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }

        $car = $this->carsRepository->create($fields);

        if (! empty($categories)) {
            $this->carsRepository->syncCategories($car, $categories);
        }

        $this->carsRepository->flushCache();

        Event::dispatch(new CarCreatedEvent($car));

        return $car;
    }

    public function update(int $id, array $fields, ?array $categories = null): Car
    {
        $car = $this->carsRepository->getById($id);
        $oldImageId = null;

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
            $oldImageId = $car->image_id;
        }

        $this->carsRepository->update($car, $fields);

        if ($categories !== null) {
            $this->carsRepository->syncCategories($car, $categories);
        }

        if (! empty($oldImageId)) {
            $this->imagesService->deleteImage($oldImageId);
        }

        $this->carsRepository->flushCache();

        Event::dispatch(new CarUpdatedEvent($car));

        return $car;
    }

    public function delete(int $id)
    {
        $car = $this->carsRepository->getById($id);

        $this->carsRepository->delete($id);

        if (! empty($car->image_id)) {
            $this->imagesService->deleteImage($car->image_id);
        }

        $this->carsRepository->flushCache();

        Event::dispatch(new CarDeletedEvent($car));
    }
}
