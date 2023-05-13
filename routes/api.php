<?php

use App\Http\Controllers\Api\CarsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cars', CarsController::class);
