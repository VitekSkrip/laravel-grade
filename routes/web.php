<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'homepage'])->name('home');

Route::get('/sales', [PagesController::class, 'sales'])->name('sales');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/clients', [PagesController::class, 'clients'])->name('clients');

Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');

Route::get('/finances', [PagesController::class, 'finances'])->name('finances');

Route::get('/articles', [PagesController::class, 'articles'])->name('articles');