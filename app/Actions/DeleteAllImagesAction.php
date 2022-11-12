<?php

namespace App\Actions;

use App\Models\Product;

class DeleteAllImagesAction
{
    public function __invoke(Product $product)
    {
        if (!is_null($product->images)) {
            foreach ($product->images as $image) {
                (new DeleteOneImageAction)($image);
            }
        }
    }
}