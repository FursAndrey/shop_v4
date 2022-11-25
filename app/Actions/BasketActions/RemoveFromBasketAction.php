<?php

namespace App\Actions\BasketActions;

use App\Models\Sku;

class RemoveFromBasketAction
{
    public function __invoke(Sku $sku)
    {
        $basket = (new GetBasketAction)();
        if (isset($basket[$sku->id]) && $basket[$sku->id]->countInBasket > 1) {
            //если существует - уменьшить кол-во
            $basket[$sku->id]->countInBasket--;
        } else {
            //иначе - удалить
            unset($basket[$sku->id]);
        }
        (new SetBasketAction)($basket);
    }
}