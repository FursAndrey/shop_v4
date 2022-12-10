<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ResetActions\ResetProjectAction;
use App\Http\Controllers\Controller;
use App\Models\Image;

class ResetController extends Controller
{
    public function resetProject()
    {
        //костыль
        $this->authorize('reset-project', Image::class);

        (new ResetProjectAction)();
        
        return redirect()->route('admin_home')->with('success', 'Project has been reset successfully.');
    }
}
