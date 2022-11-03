<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Car;
use App\Models\Category;

class CarsController extends Controller
{
    public function __construct(private CarsRepositoryContract $carsRepository)
    {

    }
    
    public function index(Request $request, ?Category $category = null): View
    {
        $allCategories = collect();
        
        if ($category) {
            $allCategories = $category->descendants->pluck('id')->push($category->id)->all();
        }

        $cars = $this->carsRepository->paginateForCatalog(16, ['*'], 'page', $request->get('page', 1))->when($category, fn ($query) => $query->whereHas('categories', fn ($query) => $query->whereIn('id', $allCategories)))
        ->get();

        return view('pages.catalog', ['cars' => $cars, 'currentCategory' => $category]);
    }

    public function show(int $id): View
    {
        $car = $this->carsRepository->getById($id);
        return view('pages.product', compact('car'));
    }
}
