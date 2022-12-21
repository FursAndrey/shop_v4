<?php

namespace App\Actions\ResetActions;

use Illuminate\Support\Facades\Artisan;

class ResetProjectAction
{
    public function __invoke(): void
    {
        Artisan::call('migrate:fresh --seed');
        
        (new ResetImagesAction)('uploads', 'reset_img');
    }
}