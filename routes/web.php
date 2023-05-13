<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\ArticlesController as BaseArticles;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Manager\ManagerPagesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalonsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestDriveController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'homepage'])->name('home');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/catalog/{slug?}', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/products/{car:id}', [CatalogController::class, 'product'])->name('product');

Route::get('/salons', [SalonsController::class, 'index'])->name('salons.index');

Route::get('/basket', [BasketController::class, 'show'])->name('basket');
Route::post('/basket', [BasketController::class, 'addProduct'])->name('basket.addProduct');
Route::delete('/basket/deleteProduct/', [BasketController::class, 'deleteProduct'])->name('basket.deleteProduct');
Route::delete('/basket/removeProduct', [BasketController::class, 'removeProduct'])->name('basket.removeProduct');

Route::get('/callback', [CallbackController::class, 'show'])->name('callback.show');
Route::post('/callback', [CallbackController::class, 'store'])->name('callback.store');
Route::post('/callback/{id}', [CallbackController::class, 'update'])->name('callback.update');

Route::get('/test-drive', [TestDriveController::class, 'show'])->name('test-drive.show');
Route::post('/test-drive', [TestDriveController::class, 'store'])->name('test-drive.store');

Route::get('/service', [ServiceController::class, 'show'])->name('service.show');

Route::middleware('auth')->group(function () {
    Route::get('/basket', [BasketController::class, 'show'])->name('basket');
    Route::post('/basket', [BasketController::class, 'addProduct'])->name('basket.addProduct');
    Route::delete('/basket/deleteProduct/', [BasketController::class, 'deleteProduct'])->name('basket.deleteProduct');
    Route::delete('/basket/removeProduct', [BasketController::class, 'removeProduct'])->name('basket.removeProduct');
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

Route::prefix('test-drive')
    ->name('manager.test-drive.')
    ->middleware(['auth', 'role:manager'])
    ->group(function (Router $router) {
        $router->post('/{id}', [TestDriveController::class, 'update'])->name('update');
        $router->get('/{id}/edit', [TestDriveController::class, 'edit'])->name('edit');
        $router->delete('/{id}', [TestDriveController::class, 'destroy'])->name('destroy');
    })
;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/orders', [OrdersController::class, 'store'])->name('orders.create');
});

Route::prefix('manager')
    ->name('manager.')
    ->middleware(['auth', 'role:manager'])
    ->group(function (Router $router) {
        $router->get('/', [ManagerPagesController::class, 'manager'])->name('manager');
    })
;

require __DIR__.'/auth.php';
