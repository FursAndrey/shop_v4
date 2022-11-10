<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_ru',
        'name_en',
        'property_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
