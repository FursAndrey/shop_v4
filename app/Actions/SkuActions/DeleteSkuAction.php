<?php

namespace App\Actions\SkuActions;

use App\Models\Sku;

class DeleteSkuAction
{
    public function __invoke(Sku $sku): void
    {
        $sku->options()->detach();
        $sku->delete();
    }
}