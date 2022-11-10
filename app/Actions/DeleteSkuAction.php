<?php

namespace App\Actions;

use App\Models\Sku;

class DeleteSkuAction
{
    public function __invoke(Sku $sku)
    {
        $sku->options()->detach();
        $sku->delete();
    }
}