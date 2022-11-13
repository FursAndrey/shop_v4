<?php

namespace App\Actions;

class SaveRequestImagesAction
{
    public function __invoke($files)
    {
        $fileNames = [];
        if (!is_null($files)) {
            foreach ($files as $image) {
                $fileNames[] = (new SaveOneRequestImageAction)($image);
            }
        }
        return $fileNames;
    }
}