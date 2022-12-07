<?php

namespace App\Providers;

use App\Models\Sku;
use App\Observers\SkuObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //для пагинаций 
        Paginator::useBootstrapFive();

        //регистриция наблюдателя для рассылки почты
        Sku::observe(SkuObserver::class);
    }
}
