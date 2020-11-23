<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api','prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('singup', [AuthController::class, 'singup']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::get('sliders', [ApiController::class, 'sliders']);
Route::get('categoryes', [ApiController::class, 'categoryes']);
Route::get('products', [ApiController::class, 'products']);
Route::get('product/{id}', [ApiController::class, 'product']);

Route::get('user/order', [CartsController::class, 'user_order']);
Route::get('user/order/{id}', [CartsController::class, 'user_order_view']);
Route::get('product/category/{id}', [ApiController::class, 'category_products']);





