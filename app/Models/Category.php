<?php

namespace App\Models;

use App\Models\Traits\dbTranslate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, dbTranslate;

    protected $fillable = [
        'name_ru',
        'name_en',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function getNameAttribute()
    {
        $fieldName = $this->translate('name');
        return $this->$fieldName;
    }
}
