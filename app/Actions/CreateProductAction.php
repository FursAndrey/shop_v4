<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateProductAction
{
    public function __invoke(Request $request)
    {
        $product = Product::create($request->validated());
        $product->properties()->sync($request->property_id);

        $fileNames = (new SaveRequestImagesAction)($request->image);
        foreach ($fileNames as $fileName) {
            Image::create([
                'product_id' => $product->id,
                'file' => $fileName
            ]);
        }
    }
}