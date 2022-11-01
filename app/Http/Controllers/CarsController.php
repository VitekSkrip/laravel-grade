<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Car;

class CarsController extends Controller
{
    public function __construct(private CarsRepositoryContract $carsRepository)
    {

    }
    
    public function index(Request $request): View
    {
        $cars = $this->carsRepository->paginateForCatalog(16, ['*'], 'page', $request->get('page', 1));

        return view('pages.catalog', compact('cars'));
    }

    public function show(int $id): View
    {
        $car = $this->carsRepository->getById($id);
        return view('pages.product', compact('car'));
    }
}
