<?php

namespace App\Actions;

use App\Models\Sku;

class AddIntoBasketAction
{
    public function __invoke(Sku $sku)
    {
        $basket = session('basket');
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
        session(['basket' => $basket]);
    }
}