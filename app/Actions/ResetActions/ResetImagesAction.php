<?php

namespace App\Actions\ResetActions;

use Illuminate\Support\Facades\Storage;

class ResetImagesAction
{
    public function __invoke(string $folderTo, string $folderFrom)
    {
        Storage::disk('public')->deleteDirectory($folderTo);
        Storage::disk('public')->makeDirectory($folderTo);

        $files = Storage::disk('public')->files($folderFrom);
        foreach ($files as $fileName) {
            $content = Storage::disk('public')->get($fileName);
            $fileName = str_replace($folderFrom, $folderTo, $fileName);
            Storage::disk('public')->put($fileName, $content);
        }
    }
}