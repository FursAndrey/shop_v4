<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ResetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SkuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('admin_home');
Route::get('/productList/{category?}', [PageController::class, 'productListPage'])->name('productList');
Route::get('/productPage/{productId}', [PageController::class, 'productPage'])->name('productPage');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('/category', CategoriesController::class);
    Route::resource('/user', UserController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
    Route::resource('/role', RoleController::class);
    Route::resource('/currency', CurrencyController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/property', PropertyController::class);
    Route::resource('/option', OptionController::class);
    Route::resource('/sku', SkuController::class);
    Route::delete('/image/{product}', [ImageController::class, 'destroyAll'])->name('daleteAllImg');
    Route::delete('/image/{product}/{image}', [ImageController::class, 'destroyOne'])->name('daleteOneImg');
    Route::get('/reset', [ResetController::class, 'resetProject'])->name('resetProject');
});