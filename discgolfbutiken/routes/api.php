<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

// Routes for Categorys
Route::post('/category', [CategoryController::class, 'store'])->middleware('auth:sanctum');
Route::get('/category', [CategoryController::class, 'index'])->middleware('auth:sanctum');
Route::get('/category/{id}', [CategoryController::class, 'show'])->middleware('auth:sanctum');
Route::put('/category/{id}', [CategoryController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->middleware('auth:sanctum');
// // Routes for Brands
Route::post('/brand', [BrandController::class, 'store'])->middleware('auth:sanctum');
Route::get('/brand', [BrandController::class, 'index'])->middleware('auth:sanctum');
Route::get('/brand/{id}', [BrandController::class, 'show'])->middleware('auth:sanctum');
Route::put('/brand/{id}', [BrandController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->middleware('auth:sanctum');

// // Routes for Discounts
Route::post('/discount', [DiscountController::class, 'store'])->middleware('auth:sanctum');
Route::get('/discount', [DiscountController::class, 'index'])->middleware('auth:sanctum');
Route::get('/discount/{id}', [DiscountController::class, 'show'])->middleware('auth:sanctum');
Route::put('/discount/{id}', [DiscountController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/discount/{id}', [DiscountController::class, 'destroy'])->middleware('auth:sanctum');

// // Routes for Products
Route::post('/product', [ProductController::class, 'store'])->middleware('auth:sanctum');
Route::get('/product', [ProductController::class, 'index'])->middleware('auth:sanctum');
Route::get('/product/{id}', [ProductController::class, 'show'])->middleware('auth:sanctum');
Route::get('/product/category/{id}', [ProductController::class, 'getProductsByCategory'])->middleware('auth:sanctum');
Route::get('/product/brand/{id}', [ProductController::class, 'getProductsByBrand'])->middleware('auth:sanctum');
Route::get('/product/discount/{id}', [ProductController::class, 'getProductsByDiscount'])->middleware('auth:sanctum');
Route::get('/calculate', [ProductController::class, 'calculateAmounts'])->middleware('auth:sanctum');
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->middleware('auth:sanctum');

// // Routes for search 
Route::get('/search/product/{name}', [ProductController::class, 'searchProductName'])->middleware('auth:sanctum');

// Route for users
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/users', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::delete('/users/{id}', [AuthController::class, 'destroy'])->middleware('auth:sanctum');

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});