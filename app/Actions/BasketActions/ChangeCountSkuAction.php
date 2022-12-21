<?php

namespace App\Actions\BasketActions;

use App\Models\Sku;

class ChangeCountSkuAction
{
    public function __invoke(array $basket): void
    {
        foreach ($basket as $skuInOrder) {
            $sku = Sku::find($skuInOrder->id);
            //цена не должна обновляться
            unset($sku->price);
            
            $sku->count -= $skuInOrder->countInBasket;
            $skuTmp = $sku->toArray();
            
            $sku->update($skuTmp);
        }
    }
}