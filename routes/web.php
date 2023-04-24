<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\ArticlesController as BaseArticles;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalonsController;
use Illuminate\Routing\Router;
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

Route::get('/catalog/{slug?}', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/products/{car:id}', [CatalogController::class, 'product'])->name('product');

Route::get('/salons', [SalonsController::class, 'index'])->name('salons.index');

Route::get('/basket', function () {
    return view('pages.basket.basket');
})->name('basket');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/articles', [BaseArticles::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [BaseArticles::class, 'show'])->name('articles.show');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function (Router $router) {
        $router->get('/', [AdminPagesController::class, 'admin'])->name('admin');
        $router->resource('cars', CarsController::class)->except(['show']);
        $router->resource('articles', ArticlesController::class)->except(['show']);
    })
;

require __DIR__.'/auth.php';
