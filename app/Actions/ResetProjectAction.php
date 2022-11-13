<?php

namespace App\Actions;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ResetProjectAction
{
    public function __invoke()
    {
        Artisan::call('migrate:fresh --seed');
        
        $folder = 'uploads';
        $folder_reset = 'reset_img';
        Storage::disk('public')->deleteDirectory($folder);
        Storage::disk('public')->makeDirectory($folder);

        $files = Storage::disk('public')->files($folder_reset);
        foreach ($files as $file_name) {
            $contents = Storage::disk('public')->get($file_name);
            $file_name = str_replace($folder_reset, $folder, $file_name);
            Storage::disk('public')->put($file_name, $contents);
        }
    }
}