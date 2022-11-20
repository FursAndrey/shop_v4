<?php

namespace App\Actions\ImageActions;

use App\Models\Image;

class DeleteOneImageAction
{
    public function __invoke(Image $image)
    {
        if (file_exists($image->file_for_delete)) {
            unlink($image->file_for_delete);
        }
        $image->delete();
    }
}