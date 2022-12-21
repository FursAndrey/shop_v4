<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => 'basketCheck'],
    function () {
        Route::get('/showBasket', [BasketController::class, 'showBasket'])->name('showBasket');
        Route::post('/fromBasket/{sku}', [BasketController::class, 'fromBasket'])->name('fromBasket');
        Route::delete('/removeItFromBasket/{sku}', [BasketController::class, 'removeItFromBasket'])->name('removeItFromBasket');
        Route::delete('/clearBasket', [BasketController::class, 'clearBasket'])->name('clearBasket');
        Route::get('/confirmForm', [OrderController::class, 'showConfirmForm'])->name('confirmForm');
        Route::post('/confirmOrder', [OrderController::class, 'confirmOrder'])->name('confirmOrder');
    }
);
Route::post('/intoBasket/{sku}', [BasketController::class, 'intoBasket'])->name('intoBasket');
Route::get('/setLocale/{locale}', [PageController::class, 'setLocale'])->name('setLocale');
Route::get('/setCurrency/{currencyCode}', [PageController::class, 'setCurrency'])->name('setCurrency');
