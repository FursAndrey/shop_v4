<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ResetProjectAction;

class ResetController
{
    public function resetProject()
    {
        (new ResetProjectAction)();
        
        return redirect()->route('admin_home')->with('success', 'Project has been reset successfully.');
    }
}
