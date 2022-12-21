<?php

namespace App\Actions\BasketActions;

class GetBasketTotalPriceAction
{
    public function __invoke(array $basket): float
    {
        $totalPrice = 0;
        //считаем общую сумму и проверяем доступность каждого товара в заказе
        foreach ($basket as $skuInOrder) {
            $totalPrice += $skuInOrder->price*$skuInOrder->countInBasket;
        }
        return $totalPrice;
    }
}