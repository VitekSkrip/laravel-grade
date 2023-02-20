<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Services\CarRemoverServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateCarRequest;
use App\Http\Requests\Api\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarsController extends Controller
{
    public function index(
        Request $request,
        CarsRepositoryContract $carsRepository,
    ): AnonymousResourceCollection
    {
        // планирую позже рефакторинг с DTO

        $allCategories = collect()->all();

        return CarResource::collection($carsRepository->paginateForCatalog(
            $allCategories,
            16,
            ['id', 'name', 'price', 'old_price', 'body', 'body_id'],
            'page',
            $request->get('page', 1)
        ));
    }

    public function store(CreateCarRequest $request, CarCreationServiceContract $carCreationService)
    {
        return new CarResource($carCreationService->create($request->validated())); 
    }

    public function show(int $id, CarsRepositoryContract $carsRepository)
    {
        return new CarResource($carsRepository->getById($id));
    }

    public function update(int $id, UpdateCarRequest $request, CarUpdateServiceContract $carUpdateService)
    {
        return new CarResource($carUpdateService->update($id, $request->validated()));
    }

    public function destroy(int $id, CarRemoverServiceContract $carRemoverService)
    {
        $carRemoverService->delete($id);

        return [$id];
    }
}
