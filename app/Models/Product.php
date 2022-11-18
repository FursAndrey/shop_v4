<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ru',
        'name_en',
        'description_ru',
        'description_en',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withTimestamps();
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    public function getOneImageAttribute()
    {
        return $this->images[0];
    }
}
