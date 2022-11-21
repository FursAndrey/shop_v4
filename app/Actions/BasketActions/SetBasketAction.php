<?php

namespace App\Actions\BasketActions;

class SetBasketAction
{
    public function __invoke($basket)
    {
        session(['basket' => $basket]);
    }
}