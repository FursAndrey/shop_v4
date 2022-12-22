<?php

namespace App\Actions\ProductActions;

use App\Actions\ImageActions\DeleteImagesAction;
use App\Models\Product;

class DeleteProductAction
{
    public function __invoke(Product $product): void
    {
        $product->properties()->detach();
        
        DeleteImagesAction::all($product);
        
        $product->delete();
    }
}