<?php

namespace App\Actions;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ResetProjectAction
{
    public function __invoke()
    {
        Artisan::call('migrate:fresh --seed');
        
        (new ResetImagesAction)('uploads', 'reset_img');
    }
}