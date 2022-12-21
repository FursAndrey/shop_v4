<?php

namespace App\Models;

use App\Models\Traits\dbTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, dbTranslate;

    protected $fillable = [
        'name_ru',
        'name_en',
        'description_ru',
        'description_en',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withTimestamps();
    }

    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
    
    public function getOneImageAttribute(): Image
    {
        return $this->images[0];
    }
    
    public function getNameAttribute()
    {
        $fieldName = $this->translate('name');
        return $this->$fieldName;
    }

    public function getDescriptionAttribute()
    {
        $fieldName = $this->translate('description');
        return $this->$fieldName;
    }
}
