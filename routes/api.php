<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\UserController;

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'store']);

Route::middleware('auth:api')->group(function () {
  Route::get('/user', [AuthenticationController::class, 'get']);
  Route::get('/products', [ProductController::class, 'products']);
  Route::get('/shops', [ShopController::class, 'shops']);
  Route::get('/categories', [CategoryController::class, 'categories']);
  Route::get('/shop/{id}/products', [ShopController::class, 'products']);
  Route::get('/{id}/products', [ProductController::class, 'productsDetails']);
});
