<?php

namespace App\Actions;

use App\Models\Image;

class SaveImagesAction
{
    public function __invoke(array $files, int $productId)
    {
        if (!is_null($files)) {
            foreach ($files as $image) {
                $fileName = $image->store('uploads', 'public');
                Image::create([
                    'product_id' => $productId,
                    'file' => $fileName
                ]);
            }
        }
    }
}