<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;


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
Auth::routes();
Route::get('/', 'App\Http\Controllers\ShopController@welcome');
Route::get('/dashboard', 'App\Http\Controllers\CustomerController@index');
Route::get('/shop', 'App\Http\Controllers\ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'App\Http\Controllers\ShopController@show')->name('shop.show');
Route::get('/search', 'App\Http\Controllers\ShopController@search')->name('search');

Route::get('/admin', 'App\Http\Controllers\DashboardController@welcome');
Route::middleware('checkRole:admin')->group(function () {
    Route::get('/admin/customers', 'App\Http\Controllers\DashboardController@customer');
    Route::get('/admin/home', 'App\Http\Controllers\DashboardController@index')->name('admin.home');
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/brands', BrandController::class);
    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/orders', OrderController::class);
    Route::get('/admin/transactions', 'App\Http\Controllers\OrderController@transaction');
    Route::get('/admin/api/categories', 'App\Http\Controllers\CategoryController@api');
    Route::get('/admin/api/brands', 'App\Http\Controllers\BrandController@api');
});

Route::post('/add-to-cart', 'App\Http\Controllers\CartController@addProduct');
Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', CustomerController::class)->middleware('checkRole:customer');
    Route::get('/cart', 'App\Http\Controllers\CartController@viewCart');
    Route::post('/update-cart-item', 'App\Http\Controllers\CartController@updateProduct');
    Route::post('/delete-cart-item', 'App\Http\Controllers\CartController@deleteProduct');
    Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index');
    Route::post('/place-order', 'App\Http\Controllers\CheckoutController@placeorder');
    Route::get('/order-confirm', 'App\Http\Controllers\CheckoutController@orderconfirm');
    Route::get('/dashboard/order-detail/{id}', 'App\Http\Controllers\CustomerController@vieworder');
});


