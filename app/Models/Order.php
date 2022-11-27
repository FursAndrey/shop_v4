<?php

namespace App\Models;

use App\Actions\BasketActions\GetBasketTotalPriceAction;
use App\Http\Requests\ConfirmRequest;
use App\Services\Conversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_name',
        'user_email',
        'description',
        'total_price',
        'currency_code',
        'status',
    ];
    
    public function orderedProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public static function prepareForCreate(ConfirmRequest $request, $basket)
    {
        $confirm = $request->validated();
        $confirm['currency_code'] = Conversion::getCurrencyCode();
        $confirm['total_price'] = (new GetBasketTotalPriceAction)($basket);

        return $confirm;
    }
}
