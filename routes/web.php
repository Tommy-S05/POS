<?php

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

Route::get('/prueba', function (){
    return view('prueba');
});

Route::resource('categories', 'App\Http\Controllers\CategoryController')->names('categories');
Route::resource('clients', 'App\Http\Controllers\ClientController')->names('clients');
Route::resource('products', 'App\Http\Controllers\ProductController')->names('products');
Route::resource('providers', 'App\Http\Controllers\ProviderController')->names('providers');
Route::resource('purchases', 'App\Http\Controllers\PurchaseController')->names('purchases');
Route::resource('sales', 'App\Http\Controllers\SaleController')->names('sales');

