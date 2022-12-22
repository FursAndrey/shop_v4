<?php

namespace App\Actions\ImageActions;

use App\Models\Image;
use App\Models\Product;

class DeleteImagesAction
{
    public static function all(Product $product): void
    {
        if (!is_null($product->images)) {
            foreach ($product->images as $image) {
                self::one($image);
            }
        }
    }

    public static function one(Image $image): void
    {
        if (file_exists($image->file_for_delete)) {
            unlink($image->file_for_delete);
        }
        $image->delete();
    }
}