<?php

namespace App\Actions;

use App\Models\Product;

class DeleteProductAction
{
    public function __invoke(Product $product)
    {
        $product->properties()->detach();
        
        (new DeleteAllImagesAction)($product);
        
        $product->delete();
    }
}