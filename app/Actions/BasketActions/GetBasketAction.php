<?php

namespace App\Actions\BasketActions;

class GetBasketAction
{
    public function __invoke()
    {
        return session('basket');
    }
}