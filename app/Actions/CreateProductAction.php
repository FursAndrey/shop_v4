<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Http\Request;

class CreateProductAction
{
    public function __invoke(Request $request)
    {
        $product = Product::create($request->validated());
        $product->properties()->sync($request->property_id);

        (new SaveImagesAction)($request->image, $product->id);
    }
}