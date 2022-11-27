<?php

namespace App\ViewComposers;

use App\Services\Conversion;
use Illuminate\View\View;

class CurrenciesComposer
{
    public function compose(View $view)
    {
        $currencies = Conversion::getCurrencies();
        $view->with('currencies', $currencies);
    }
}
