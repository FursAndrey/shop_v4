<?php

namespace App\Actions\BasketActions;

class GetBasketAction
{
    public function __invoke(): array
    {
        return session('basket');
    }
}