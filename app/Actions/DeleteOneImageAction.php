<?php

namespace App\Actions;

use App\Models\Image;

class DeleteOneImageAction
{
    public function __invoke(Image $image)
    {
        $file_image = str_replace('/', '\\', 'storage/'.$image->file);
        if (file_exists($file_image)) {
            unlink($file_image);
        }
        $image->delete();
    }
}