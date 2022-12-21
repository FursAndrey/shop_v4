<?php

namespace App\Models;

use App\Models\Traits\dbTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Option extends Model
{
    use HasFactory, dbTranslate;
    
    protected $fillable = [
        'name_ru',
        'name_en',
        'property_id',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function skus(): BelongsToMany
    {
        return $this->belongsToMany(Sku::class)->withTimestamps();
    }
    
    public function getNameAttribute()
    {
        $fieldName = $this->translate('name');
        return $this->$fieldName;
    }
}
