<?php

namespace App\Policies;

use App\Models\Sku;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasAnyRole(['seller', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Sku $sku)
    {
        return $user->hasAnyRole(['seller', 'admin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasAnyRole(['seller', 'admin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Sku $sku)
    {
        return $user->hasAnyRole(['seller', 'admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Sku $sku)
    {
        return $user->hasAnyRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Sku $sku)
    {
        return false;
        return $user->roles->containsStrict('id', 1);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Sku $sku)
    {
        return false;
        return $user->roles->containsStrict('id', 1);
    }
}
