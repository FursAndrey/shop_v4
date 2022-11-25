<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'sku_id',
        'name_ru',
        'name_en',
        'count',
        'price_for_once',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderedProperties()
    {
        return $this->hasMany(OrderedProperty::class);
    }

    public static function prepareForCreate(Sku $skuFromBasket, int $orderId)
    {
        $orderedProduct['sku_id'] = $skuFromBasket->id;
        $orderedProduct['name_ru'] = $skuFromBasket->product->name_ru;
        $orderedProduct['name_en'] = $skuFromBasket->product->name_en;
        $orderedProduct['count'] = $skuFromBasket->countInBasket;
        $orderedProduct['price_for_once'] = $skuFromBasket->price;
        $orderedProduct['order_id'] = $orderId;
        return $orderedProduct;
    }
}
