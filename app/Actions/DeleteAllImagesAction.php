<?php

namespace App\Actions;

use App\Models\Product;

class DeleteAllImagesAction
{
    public function __invoke(Product $product)
    {
        if (!is_null($product->images)) {
            foreach ($product->images as $image) {
                $file_image = str_replace('/', '\\', 'storage/'.$image->file);
                if (file_exists($file_image)) {
                    unlink($file_image);
                }
                $image->delete();
            }
        }
    }
}