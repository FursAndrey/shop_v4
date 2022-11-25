<?php

namespace App\Actions\BasketActions;

class UnsetBasketAction
{
    public function __invoke()
    {
        session()->forget('basket');
    }
}