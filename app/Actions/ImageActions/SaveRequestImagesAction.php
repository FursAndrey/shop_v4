<?php

namespace App\Actions\ImageActions;

class SaveRequestImagesAction
{
    public function __invoke(array $files): array
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