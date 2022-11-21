<?php

namespace App\Actions\BasketActions;

use App\Models\Sku;

class RemoveItFromBasketAction
{
    public function __invoke(Sku $sku)
    {
        $basket = (new GetBasketAction)();
        
        //иначе - удалить
        unset($basket[$sku->id]);
        
        (new SetBasketAction)($basket);
    }
}