<?php

namespace App\Actions;

class SaveImagesAction
{
    public function __invoke($files)
    {
        $fileNames = [];
        if (!is_null($files)) {
            foreach ($files as $image) {
                $fileNames[] = (new SaveOneImageAction)($image);
            }
        }
        return $fileNames;
    }
}