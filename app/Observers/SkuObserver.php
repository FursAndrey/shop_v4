<?php

namespace App\Observers;

use App\Mail\SendMailForManager;
use App\Models\Sku;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SkuObserver
{
    public function updating(Sku $sku)
    {
        $oldCount = $sku->getOriginal('count');
        
        if (0 < $oldCount && $sku->count == 0) {
            
            $sellers = User::select('email')->sellers()->get();
            foreach ($sellers as $seller) {
                Mail::to($seller->email)->send(new SendMailForManager($sku));
            }
        }
    }
}
