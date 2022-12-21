<?php

namespace App\Actions\BasketActions;

use App\Models\Sku;

class AddIntoBasketAction
{
    public function __invoke(Sku $sku): void
    {
        $basket = (new GetBasketAction)();
        if (isset($basket[$sku->id])) {
            //если существует - увеличить кол-во
            if ($sku->countInBasket < $sku->count) {
                $basket[$sku->id]->countInBasket++;
            }
        } else {
            //иначе - создать
            $sku->countInBasket = 1;
            $basket[$sku->id] = $sku;
        }
        (new SetBasketAction)($basket);
    }
}