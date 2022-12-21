<?php

namespace App\Actions\BasketActions;

class ClearBasketAction
{
    public function __invoke(): void
    {
        session()->forget('basket');
    }
}