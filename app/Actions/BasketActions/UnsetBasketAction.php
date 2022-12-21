<?php

namespace App\Actions\BasketActions;

class UnsetBasketAction
{
    public function __invoke(): void
    {
        session()->forget('basket');
    }
}