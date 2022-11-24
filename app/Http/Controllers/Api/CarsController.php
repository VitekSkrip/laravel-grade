<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\CarsRepositoryContract;
use App\Contracts\Repositories\CategoriesRepositoryContract;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(
        Request $request,
        CategoriesRepositoryContract $categoriesRepository,
        CarsRepositoryContract $carsRepository,
        ?string $slug = null
    )
    {
        // планирую рефакторинг с DTO

        $allCategories = collect()->all();
        $category = null;
        
        if ($slug) {
            $category = $categoriesRepository->getBySlug($slug, ['descendants']);
            $allCategories = $category->descendants->pluck('id')->push($category->id)->all();
        }

        return $this->carsRepository->paginateForCatalog(
            $allCategories,
            16,
            ['id', 'name', 'price', 'old_price', 'image_id'], 'page',
            $request->get('page', 1))
        ;
    }

    public function store()
    {
        // return $carCreationService->create(...);
    }

    public function show(
        int $id,
        CarsRepositoryContract $carsRepository
    )
    {
        return $carsRepository->getById($id);
    }

    public function update()
    {
        // return $carUpdateService->update(...);
    }

    public function destroy()
    {
        //
    }
}
