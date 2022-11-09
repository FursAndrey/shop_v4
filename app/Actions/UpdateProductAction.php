<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProductAction
{
    public function __invoke(Request $request, Product $product)
    {
        $product->fill($request->validated())->save();
        $product->properties()->sync($request->property_id);
    }
}