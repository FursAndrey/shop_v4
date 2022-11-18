<?php

namespace App\Http\Controllers;

use App\Actions\AddIntoBasketAction;
use App\Models\Sku;

class BasketController
{
    public function intoBasket(Sku $sku)
    {
        (new AddIntoBasketAction)($sku);
        
        return redirect()->route('productList');
    }

    public function showBasket()
    {
        $basket = session('basket');
        return view('shop.basket', compact('basket'));
    }
}
