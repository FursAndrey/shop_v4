<?php

namespace App\Actions\BasketActions;

class SetBasketAction
{
    public function __invoke(array $basket): void
    {
        session(['basket' => $basket]);
    }
}