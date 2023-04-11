<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalonsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'homepage'])->name('home');

Route::get('/sales', [PagesController::class, 'sales'])->name('sales');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/clients', [PagesController::class, 'clients'])->name('clients');

Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');

Route::get('/finances', [PagesController::class, 'finances'])->name('finances');

Route::resource('articles', ArticlesController::class)->scoped(['article' => 'slug']);

Route::get('/catalog/{slug?}', [CarsController::class, 'index'])->name('catalog');

Route::get('/products/{car:id}', [CarsController::class, 'show'])->name('product');

Route::get('/salons', [SalonsController::class, 'index'])->name('salons.index');

Route::middleware(['auth', 'role'])->prefix('reports')->group(function () {
    Route::get('/', [PagesController::class, 'reports'])->name('reports');
    Route::view('/statistics', 'pages.statistics')->name('statistics');
    Route::post('/statistics', [PagesController::class, 'generateStat'])->name('generate.stat');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
