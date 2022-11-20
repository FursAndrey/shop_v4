<?php

namespace App\Actions\ProductActions;

use App\Actions\ImageActions\DeleteAllImagesAction;
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