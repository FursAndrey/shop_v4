<?php

namespace App\Http\Controllers;

use App\Actions\BasketActions\GetBasketAction;
use App\Http\Requests\ConfirmRequest;

class OrderController
{
    public function showConfirmForm()
    {
        $basket = (new GetBasketAction)();
        return view('shop.confirmOrder', compact('basket'));
    }

    public function confirmOrder(ConfirmRequest $request)
    {
        
    }
}
