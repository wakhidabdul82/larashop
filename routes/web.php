<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;

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
Route::get('/', 'App\Http\Controllers\ShopController@welcome');
Route::get('/dashboard', 'App\Http\Controllers\CustomerController@index');
Route::get('shop', 'App\Http\Controllers\ShopController@index')->name('shop.index');
Route::get('shop/{product}', 'App\Http\Controllers\ShopController@show')->name('shop.show');


Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@welcome');
    Route::get('/customers', 'App\Http\Controllers\DashboardController@customer')->middleware('checkRole:admin');
    Auth::routes();
    Route::get('home', 'App\Http\Controllers\DashboardController@index')->middleware('checkRole:admin');
    Route::resource('categories', CategoryController::class)->middleware('checkRole:admin');
    Route::resource('brands', BrandController::class)->middleware('checkRole:admin');
    Route::resource('products', ProductController::class)->middleware('checkRole:admin');


    Route::get('api/categories', [App\Http\Controllers\CategoryController::class, 'api']);
    Route::get('api/brands', [App\Http\Controllers\BrandController::class, 'api']);
});

Route::resource('dashboard', CustomerController::class)->middleware('checkRole:customer');
Route::prefix('dashboard')->group(function () {
    //
});