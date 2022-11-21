<?php

namespace App\Http\Middleware;

use App\Actions\BasketActions\GetBasketAction;
use Closure;
use Illuminate\Http\Request;

class BasketCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $basket = (new GetBasketAction)();
        if (empty($basket)) {
            return redirect()->route('productList');
        }
        
        return $next($request);
    }
}
