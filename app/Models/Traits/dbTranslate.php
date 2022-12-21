<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;

trait dbTranslate {
    protected $defaultLocale = 'ru';

    public function translate(string $fieldName): string
    {
        $locale = App::getLocale() ?? $this->defaultLocale;
        return $fieldName.'_'.$locale;
    }
}