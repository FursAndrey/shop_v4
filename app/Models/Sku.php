<?php

namespace App\Models;

use App\Services\Conversion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'count',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class)->withTimestamps();
    }

    public function getCurrencyCodeAttribute()
    {
        return Conversion::getCurrencyCode();
    }

    public function getPriceAttribute($value)
    {
        return Conversion::convert($value);
    }
    
    public function getIsNewAttribute()
    {
        $sevenDaysBeforeNow = Carbon::now()->subDays(7);
        return $sevenDaysBeforeNow <= Carbon::parse($this->attributes['created_at']);
    }
    
    public function getIsHitAttribute()
    {
        $hitSkus = OrderedProduct::hitArray();
        
        foreach ($hitSkus as $key => $hit) {
            if ($hit['sku_id'] == $this->id) {
                return true;
            }
        }
        return false;
    }
}
