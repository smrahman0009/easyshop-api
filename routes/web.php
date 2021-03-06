<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\productSizeController;
use App\Http\Controllers\SubCategoryController;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\SubCategory;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('products',ProductController::class);
Route::resource('category',CategoryController::class);
Route::resource('subcategory',SubCategoryController::class);
Route::resource('product/size',ProductSizeController::class);
Route::resource('product/color',ProductColorController::class);
