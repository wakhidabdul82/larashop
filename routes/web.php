<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

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
Route::get('/', 'App\Http\Controllers\HomepageController@welcome');
Route::get('/shop', 'App\Http\Controllers\HomepageController@shop');
Route::get('/dashboard', 'App\Http\Controllers\CustomerController@index');


Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@welcome');
    Route::get('/customers', 'App\Http\Controllers\DashboardController@customer');
    Auth::routes();
    Route::get('home', 'App\Http\Controllers\DashboardController@index')->middleware('checkRole:admin');
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);


    Route::get('api/categories', [App\Http\Controllers\CategoryController::class, 'api']);
    Route::get('api/brands', [App\Http\Controllers\BrandController::class, 'api']);
});
Route::resource('dashboard', CustomerController::class)->middleware('checkRole:customer');
Route::prefix('dashboard')->group(function () {
    //
});