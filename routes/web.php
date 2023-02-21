<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('sales/reports_day', [ReportController::class, 'reports_day'])->name('reports.day');
Route::get('sales/reports_date', [ReportController::class, 'reports_date'])->name('reports.date');
Route::post('sales/reports_results', [ReportController::class, 'reports_results'])->name('reports.results');

Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('clients', ClientController::class)->names('clients');

Route::resource('products', ProductController::class)->names('products');
Route::get('products/change/{product}', [ProductController::class, 'change_status'])->name('products.change');

Route::resource('providers', ProviderController::class)->names('providers');

Route::resource('purchases', PurchaseController::class)->names('purchases')->except(['edit', 'update', 'destroy']);
Route::get('purchases/pdf/{purchase}', [PurchaseController::class, 'pdf'])->name('purchases.pdf');
Route::get('purchases/upload/{purchase}', [PurchaseController::class, 'upload'])->name('purchases.upload');
Route::get('purchases/change/{purchase}', [PurchaseController::class, 'change_status'])->name('purchases.change');

Route::resource('sales', SaleController::class)->names('sales')->except(['edit', 'update', 'destroy']);
Route::get('sales/pdf/{sale}', [SaleController::class, 'pdf'])->name('sales.pdf');
Route::get('sales/print/{sale}', [SaleController::class, 'print'])->name('sales.print');
Route::get('sales/change/{sale}', [SaleController::class, 'change_status'])->name('sales.change');

Route::resource('businesses', BusinessController::class)->names('businesses')->only(['index', 'update']);
Route::resource('printers', PrinterController::class)->names('printers')->only(['index', 'update']);

//Route::resource('users', UserController::class)->names('users')->only(['index', 'edit', 'update']);
Route::resource('users', UserController::class)->names('users');
Route::resource('roles', RoleController::class)->names('roles');
