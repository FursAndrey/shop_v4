<?php

namespace App\Actions\BasketActions;

class ClearBasketAction
{
    public function __invoke()
    {
        session()->forget('basket');
    }
}