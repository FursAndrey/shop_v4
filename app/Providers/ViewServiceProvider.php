<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                '.........welcome', 
            ],
            'App\ViewComposers\CategoriesComposer'
        );
        View::composer(
            [
                '.........welcome', 
            ],
            'App\ViewComposers\CurrenciesComposer'
        );
    }
}
