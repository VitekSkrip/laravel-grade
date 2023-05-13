<?php

namespace App\Services;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\Cars\CarCreationServiceContract;
use App\Contracts\Services\Cars\CarRemoverServiceContract;
use App\Contracts\Services\Cars\CarUpdateServiceContract;
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

    public function create(array $fields, int $categoryId): Car
    {
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
        }

        $car = $this->carsRepository->create($fields);

        $this->carsRepository->syncCategory($car, $categoryId);

        $this->carsRepository->flushCache();

        Event::dispatch(new CarCreatedEvent($car));

        return $car;
    }

    public function update(int $id, array $fields, int $categoryId): Car
    {
        $car = $this->carsRepository->getById($id);
        $oldImageId = null;

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createImage($fields['image']);
            $fields['image_id'] = $image->id;
            $oldImageId = $car->image_id;
        }

        $this->carsRepository->update($car, $fields);

        $this->carsRepository->syncCategory($car, $categoryId);

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
