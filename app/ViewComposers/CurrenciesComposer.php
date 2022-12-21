<?php

namespace App\ViewComposers;

use App\Services\Conversion;
use Illuminate\View\View;

class CurrenciesComposer
{
    public function compose(View $view): void
    {
        $currencies = Conversion::getCurrencies();
        $view->with('currencies', $currencies);
    }
}
