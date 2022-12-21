<?php

namespace App\Actions\UserActions;

use App\Models\User;

class DeleteUserAction
{
    public function __invoke(User $user): void
    {
        $user->roles()->detach();
        $user->delete();
    }
}