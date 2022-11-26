<?php

namespace App\Models;

use App\Models\Traits\dbTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProperty extends Model
{
    use HasFactory, dbTranslate;
    
    protected $fillable = [
        'ordered_product_id',
        'property_name_ru',
        'property_name_en',
        'option_name_ru',
        'option_name_en',
    ];

    public function orderedProduct()
    {
        return $this->belongsTo(OrderedProduct::class);
    }

    public static function prepareForCreate(Option $option, int $productId)
    {
        $orderedProperty['property_name_ru'] = $option->property->name_ru;
        $orderedProperty['property_name_en'] = $option->property->name_en;
        $orderedProperty['option_name_ru'] = $option->name_ru;
        $orderedProperty['option_name_en'] = $option->name_en;
        $orderedProperty['ordered_product_id'] = $productId;
        return $orderedProperty;
    }
    
    public function getPropertyNameAttribute()
    {
        $fieldName = $this->translate('property_name');
        return $this->$fieldName;
    }

    public function getOprionNameAttribute()
    {
        $fieldName = $this->translate('option_name');
        return $this->$fieldName;
    }

}
