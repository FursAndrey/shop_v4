<?php

namespace App\Http\Controllers;

use App\Actions\BasketActions\GetBasketAction;
use Illuminate\Http\Request;

class OrderController
{
    public function showConfirmForm()
    {
        $basket = (new GetBasketAction)();
        return view('shop.confirmOrder', compact('basket'));
    }

    public function confirmOrder()
    {
        
    }
}
