<?php

namespace App\Http\Controllers;

use App\Actions\BasketActions\ChangeCountSkuAction;
use App\Actions\BasketActions\GetBasketAction;
use App\Actions\BasketActions\InvalidCountInBasketAction;
use App\Actions\BasketActions\UnsetBasketAction;
use App\Http\Requests\ConfirmRequest;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\OrderedProperty;

class OrderController
{
    public function showConfirmForm()
    {
        $basket = (new GetBasketAction)();
        return view('shop.confirmOrder', compact('basket'));
    }

    public function confirmOrder(ConfirmRequest $request)
    {
        $basket = (new GetBasketAction)();
        
        if ((new InvalidCountInBasketAction)($basket)) {
            return redirect()->route('showBasket');
        }
        (new ChangeCountSkuAction)($basket);

        $prepareOrder = Order::prepareForCreate($request, $basket);
        $orderId = (Order::create($prepareOrder))->id;
        
        foreach ($basket as $skuInOrder) {
            $prepareOrderedProduct = OrderedProduct::prepareForCreate($skuInOrder, $orderId);
            $orderedProductId = (OrderedProduct::create($prepareOrderedProduct))->id;

            foreach ($skuInOrder->options as $option) {
                $prepareOrderedProperty = OrderedProperty::prepareForCreate($option, $orderedProductId);
                OrderedProperty::create($prepareOrderedProperty);
            }
        }

        (new UnsetBasketAction)();
        
        return redirect()->route('productList');
    }
}
