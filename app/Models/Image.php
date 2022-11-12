<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'product_id',
    ];

    public function produst()
    {
        return $this->belongsTo(Product::class);
    }
}
