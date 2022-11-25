<?php

namespace App\Actions\ImageActions;

class SaveOneRequestImageAction
{
    public function __invoke($image)
    {
        return $image->store('uploads', 'public');
    }
}