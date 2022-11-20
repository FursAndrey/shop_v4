<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ResetController;
use App\Http\Controllers\Admin\SkuController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\PageController;
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
})->name('admin_home');
Route::get('/productList/{categpry?}', [PageController::class, 'productListPage'])->name('productList');
Route::get('/productPage/{productId}', [PageController::class, 'productPage'])->name('productPage');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('/category', CategoriesController::class);
    Route::resource('/currency', CurrencyController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/property', PropertyController::class);
    Route::resource('/option', OptionController::class);
    Route::resource('/sku', SkuController::class);
    Route::delete('/image/{product}', [ImageController::class, 'destroyAll'])->name('daleteAllImg');
    Route::delete('/image/{product}/{image}', [ImageController::class, 'destroyOne'])->name('daleteOneImg');
    Route::get('/reset', [ResetController::class, 'resetProject'])->name('resetProject');
});
Route::group(
    ['middleware' => 'basketCheck'],
    function () {
        Route::get('/showBasket', [BasketController::class, 'showBasket'])->name('showBasket');
        Route::post('/fromBasket/{sku}', [BasketController::class, 'fromBasket'])->name('fromBasket');
    }
);
Route::post('/intoBasket/{sku}', [BasketController::class, 'intoBasket'])->name('intoBasket');

require __DIR__.'/auth.php';
