<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Services\CarCreationServiceContract;
use App\Contracts\Services\CarRemoverServiceContract;
use App\Contracts\Services\CarUpdateServiceContract;
use App\DTO\CatalogFilterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateCarRequest;
use App\Http\Requests\Api\UpdateCarRequest;
use App\Http\Resources\CarResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarsController extends Controller
{
    public function index(Request $request, CarsRepositoryContract $carsRepository): AnonymousResourceCollection
    {
        return CarResource::collection($carsRepository->paginateForCatalog(
            new CatalogFilterDTO(),
            ['id', 'name', 'price', 'old_price', 'image_id'],
            $request->get('perPage', 10),
            $request->get('page', 1),
            'page',
            ['image:id,path']
        ));
    }

    public function store(CreateCarRequest $request, CarCreationServiceContract $carCreationService): CarResource
    {
        return new CarResource($carCreationService->create($request->validated(), $request->get('categories', [])));
    }

    public function show($id, CarsRepositoryContract $carsRepository): CarResource
    {
        return new CarResource($carsRepository->getById($id, ['image:id,path', 'categories']));
    }

    public function update(UpdateCarRequest $request, $id, CarUpdateServiceContract $carUpdateService): CarResource
    {
        return new CarResource($carUpdateService->update($id, $request->validated(), $request->get('categories')));
    }

    public function destroy($id, CarRemoverServiceContract $carRemoverService): array
    {
        $carRemoverService->delete($id);

        return [$id];
    }
}
