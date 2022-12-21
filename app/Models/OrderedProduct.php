<?php

namespace App\Models;

use App\Models\Traits\dbTranslate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderedProduct extends Model
{
    use HasFactory, dbTranslate;

    protected $fillable = [
        'order_id',
        'sku_id',
        'name_ru',
        'name_en',
        'count',
        'price_for_once',
    ];

    protected static $hitArray = [];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function orderedProperties(): HasMany
    {
        return $this->hasMany(OrderedProperty::class);
    }

    public static function prepareForCreate(Sku $skuFromBasket, int $orderId): array
    {
        $orderedProduct['sku_id'] = $skuFromBasket->id;
        $orderedProduct['name_ru'] = $skuFromBasket->product->name_ru;
        $orderedProduct['name_en'] = $skuFromBasket->product->name_en;
        $orderedProduct['count'] = $skuFromBasket->countInBasket;
        $orderedProduct['price_for_once'] = $skuFromBasket->price;
        $orderedProduct['order_id'] = $orderId;
        return $orderedProduct;
    }
    
    public function getNameAttribute()
    {
        $fieldName = $this->translate('name');
        return $this->$fieldName;
    }
    
    public static function getHitArray(): array
    {
        return self::hitArray();
    }

    protected static function hitArray(): array
    {
        if (self::$hitArray == []) {
            self::$hitArray = self::groupBy('sku_id')
                ->selectRaw('sku_id, sum(count) as count')
                ->where('created_at', '>=', Carbon::now()->subDays(7))
                ->orderBy('count', 'DESC')
                ->take(5)
                ->get()
                ->toArray();
        }
        return self::$hitArray;
    }
}
