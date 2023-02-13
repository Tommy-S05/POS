<?php

use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\PurchaseController;
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

Route::resource('categories', 'App\Http\Controllers\CategoryController')->names('categories');

Route::resource('clients', 'App\Http\Controllers\ClientController')->names('clients');

Route::resource('products', 'App\Http\Controllers\ProductController')->names('products');
Route::get('products/change/{product}', [\App\Http\Controllers\ProductController::class, 'change_status'])->name('products.change');

Route::resource('providers', 'App\Http\Controllers\ProviderController')->names('providers');

Route::resource('purchases', 'App\Http\Controllers\PurchaseController')->names('purchases')->except(['edit', 'update', 'destroy']);
Route::get('purchases/pdf/{purchase}', [\App\Http\Controllers\PurchaseController::class, 'pdf'])->name('purchases.pdf');
Route::get('purchases/upload/{purchase}', [\App\Http\Controllers\PurchaseController::class, 'upload'])->name('purchases.upload');
Route::get('purchases/change/{purchase}', [\App\Http\Controllers\PurchaseController::class, 'change_status'])->name('purchases.change');

Route::resource('sales', 'App\Http\Controllers\SaleController')->names('sales')->except(['edit', 'update', 'destroy']);
Route::get('sales/pdf/{sale}', [\App\Http\Controllers\SaleController::class, 'pdf'])->name('sales.pdf');
Route::get('sales/print/{sale}', [\App\Http\Controllers\SaleController::class, 'print'])->name('sales.print');
Route::get('sales/change/{sale}', [\App\Http\Controllers\SaleController::class, 'change_status'])->name('sales.change');

Route::resource('businesses', 'App\Http\Controllers\BusinessController')->names('businesses')->only(['index', 'update']);
Route::resource('businesses', 'App\Http\Controllers\PrinterController')->names('printers')->only(['index', 'update']);

Route::get('sales/reports_day', [\App\Http\Controllers\ReportController::class, 'reports_day'])->name('reports.day');
Route::get('sales/reports_date', [\App\Http\Controllers\ReportController::class, 'reports_date'])->name('reports.date');
Route::post('sales/reports_results', [\App\Http\Controllers\ReportController::class, 'reports_results'])->name('reports.results');
