<?php

namespace App\Actions\ProductActions;

use App\Actions\ImageActions\SaveImagesAction;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateProductAction
{
    public function __invoke(Request $request): void
    {
        $product = Product::create($request->validated());
        $product->properties()->sync($request->property_id);

        $fileNames = SaveImagesAction::all($request->image);
        foreach ($fileNames as $fileName) {
            Image::create([
                'product_id' => $product->id,
                'file' => $fileName
            ]);
        }
    }
}