<?php

namespace App\Http\Controllers;

use App\Actions\BasketActions\AddIntoBasketAction;
use App\Actions\BasketActions\ClearBasketAction;
use App\Actions\BasketActions\GetBasketAction;
use App\Actions\BasketActions\RemoveFromBasketAction;
use App\Actions\BasketActions\RemoveItFromBasketAction;
use App\Models\Sku;

class BasketController
{
    public function showBasket()
    {
        $basket = (new GetBasketAction)();
        return view('shop.basket', compact('basket'));
    }

    public function intoBasket(Sku $sku)
    {
        (new AddIntoBasketAction)($sku);
        
        return redirect()->back();
    }

    public function fromBasket(Sku $sku)
    {
        (new RemoveFromBasketAction)($sku);

        return redirect()->back();
    }

    public function clearBasket()
    {
        (new ClearBasketAction)();

        return redirect()->route('productList');
    }

    public function removeItFromBasket(Sku $sku)
    {
        (new RemoveItFromBasketAction)($sku);
        
        return redirect()->back();
    }
}
