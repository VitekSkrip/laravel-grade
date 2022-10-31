<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CarsRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Car;

class CarsController extends Controller
{
    public function __construct(private readonly CarsRepositoryContract $carsRepository)
    {
        
    }
    
    public function index(): View
    {
        $cars = $this->carsRepository->findAll();
        return view('pages.catalog', ['cars' => $cars]);
    }

    public function show(Car $car): View
    {
        return view('pages.product', ['car' => $car]);
    }
}
