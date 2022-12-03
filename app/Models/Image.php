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

    public function setFileAttribute(string $imgUrl)
    {
        $this->attributes['file'] = preg_replace('/^[A-Za-z0-9_]+\/{1}/', '', $imgUrl);
    }

    public function getFileForDeleteAttribute()
    {
        return str_replace('/', '\\', 'storage/uploads/'.$this->file);
    }

    public function getFileForViewAttribute()
    {
        return url('/storage/uploads/'.$this->file);
    }
}
