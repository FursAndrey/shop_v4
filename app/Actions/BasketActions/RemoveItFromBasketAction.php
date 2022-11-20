<?php

namespace App\Actions\BasketActions;

use App\Models\Sku;

class RemoveItFromBasketAction
{
    public function __invoke(Sku $sku)
    {
        $basket = session('basket');
        
        //иначе - удалить
        unset($basket[$sku->id]);
        
        session(['basket' => $basket]);
    }
}