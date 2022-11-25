<?php

namespace App\Actions\BasketActions;

class GetBasketTotalPriceAction
{
    public function __invoke($basket)
    {
        $totalPrice = 0;
        //считаем общую сумму и проверяем доступность каждого товара в заказе
        foreach ($basket as $skuInOrder) {
            $totalPrice += $skuInOrder->price*$skuInOrder->countInBasket;
        }
        return $totalPrice;
    }
}