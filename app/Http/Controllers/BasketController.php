<?php

namespace App\Http\Controllers;

use App\Actions\BasketActions\AddIntoBasketAction;
use App\Actions\BasketActions\RemoveFromBasketAction;
use App\Models\Sku;

class BasketController
{
    public function showBasket()
    {
        $basket = session('basket');
        return view('shop.basket', compact('basket'));
    }

    public function intoBasket(Sku $sku)
    {
        (new AddIntoBasketAction)($sku);
        
        return redirect()->route('productList');
    }

    public function fromBasket(Sku $sku)
    {
        (new RemoveFromBasketAction)($sku);

        return redirect()->route('productList');
    }
}
