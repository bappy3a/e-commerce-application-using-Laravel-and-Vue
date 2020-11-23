<?php

use App\Http\Controllers\Api\CartsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//Admin Route
Route::group(['prefix' =>'app'], function(){
	Route::view('/','backend.index')->name('dashboard');
	//slider
	Route::resource('slider', SliderController::class);
	//Category
	Route::resource('category', CategoryController::class);
	Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
	//Product
	Route::resource('product', ProductController::class);
	Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

	Route::post('product/featured', [ProductController::class, 'updateFeatured'])->name('products.featured');
	Route::post('product/published', [ProductController::class, 'updatePublished'])->name('products.published');
});

Route::get('app/cart/show', [CartsController::class, 'allcarts']);
Route::post('app/cart/to/cart', [CartsController::class, 'addtocart']);
Route::post('app/cart/remove', [CartsController::class, 'removetocart']);
Route::post('app/cart/cart/qty', [CartsController::class, 'addtocartqty']);
Route::post('app/cart/minus', [CartsController::class, 'cartminus']);
Route::post('app/cart/plus', [CartsController::class, 'cartplus']);
Route::post('api/app/order', [CartsController::class, 'order']);






Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');