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
    
    public function index(): View
    {
        $cars = $this->carsRepository->findAll();
        return view('pages.catalog', ['cars' => $cars]);
    }

    public function show(int $id): View
    {
        $car = $this->carsRepository->getById($id);
        return view('pages.product', ['car' => $car]);
    }
}
