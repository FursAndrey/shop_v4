<?php

namespace App\Models;

use App\Services\Conversion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'count',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class)->withTimestamps();
    }

    public function getCurrencyCodeAttribute(): string
    {
        return Conversion::getCurrencyCode();
    }

    public function getPriceAttribute(float $value): float
    {
        return Conversion::convert($value);
    }
    
    public function getIsNewAttribute(): bool
    {
        $sevenDaysBeforeNow = Carbon::now()->subDays(7);
        return $sevenDaysBeforeNow <= Carbon::parse($this->attributes['created_at']);
    }
    
    public function getIsHitAttribute(): bool
    {
        $hitSkus = OrderedProduct::getHitArray();
        
        foreach ($hitSkus as $key => $hit) {
            if ($hit['sku_id'] == $this->id) {
                return true;
            }
        }
        return false;
    }
}
