<?php
namespace App\Services;

use App\Models\Currency;

class Conversion
{
    protected static $container;
    
    protected static function loadContainer(): void
    {
        if (is_null(self::$container)) {
            $currencies = Currency::get();
            foreach ($currencies as $cur) {
                self::$container[$cur->code] = $cur;
            }
        }
    }

    public static function getCurrencies(): array
    {
        self::loadContainer();
        return self::$container;
    }

    public static function getCurrencyCode(): string
    {
        return session('currency', 'BYN');
    }

    public static function setCurrencyCode(string $currencyCode): void
    {
        session(['currency' => $currencyCode]);
    }

    public static function convert(float $sum, string $from = 'BYN', string $to = null): float
    {
        self::loadContainer();
        $originCurrency = self::$container[$from];
        if (is_null($to)) {
            $to = self::getCurrencyCode();
        }
        $targetCurrency = self::$container[$to];

        return round($sum * $originCurrency->rate / $targetCurrency->rate, 2);
    }
}