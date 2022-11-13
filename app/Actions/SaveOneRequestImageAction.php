<?php

namespace App\Actions;

class SaveOneRequestImageAction
{
    public function __invoke($image)
    {
        return $image->store('uploads', 'public');
    }
}