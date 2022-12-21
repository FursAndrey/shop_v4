<?php

namespace App\Actions\ImageActions;

use Illuminate\Http\UploadedFile;

class SaveOneRequestImageAction
{
    public function __invoke(UploadedFile $image): string
    {
        return $image->store('uploads', 'public');
    }
}