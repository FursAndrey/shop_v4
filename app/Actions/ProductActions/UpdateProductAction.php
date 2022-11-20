<?php

namespace App\Actions\ProductActions;

use App\Actions\ImageActions\SaveRequestImagesAction;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProductAction
{
    public function __invoke(Request $request, Product $product)
    {
        $product->fill($request->validated())->save();
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