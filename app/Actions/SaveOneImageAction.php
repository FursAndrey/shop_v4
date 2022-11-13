<?php

namespace App\Actions;

class SaveOneImageAction
{
    public function __invoke($image)
    {
        return $image->store('uploads', 'public');
    }
}