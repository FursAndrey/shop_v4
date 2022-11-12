<?php

namespace App\Actions;

use App\Models\Image;
use Illuminate\Http\Request;

class SaveImagesAction
{
    public function __invoke(Request $request, int $productId)
    {
        if (!is_null($request->image)) {
            foreach ($request->image as $image) {
                $fileName = $image->store('uploads', 'public');
                Image::create([
                    'product_id' => $productId,
                    'file' => $fileName
                ]);
            }
        }
    }
}