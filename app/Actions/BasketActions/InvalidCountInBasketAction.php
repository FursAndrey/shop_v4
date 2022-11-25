<?php

namespace App\Actions\BasketActions;

use App\Models\Sku;

class InvalidCountInBasketAction
{
    public function __invoke($basket)
    {
        foreach ($basket as $skuInOrder) {
            $sku = Sku::find($skuInOrder->id);
            if ($sku->count < $skuInOrder->countInBasket) {
                return true;
            }
        }
        return false;
    }
}