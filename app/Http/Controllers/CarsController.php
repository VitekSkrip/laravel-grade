<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Car;

class CarsController extends Controller
{
    public function index(): View
    {
        $cars = Car::get();
        return view('pages.catalog', ['cars' => $cars]);
    }

    public function show(Car $car): View
    {
        return view('pages.product', ['car' => $car]);
    }
}
