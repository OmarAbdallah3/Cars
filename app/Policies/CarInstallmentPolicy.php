<?php

namespace App\Policies;

use App\Models\Product;

use Illuminate\Auth\Access\Response;
use Modules\User\Entities\User;
use Spatie\Permission\Traits\HasPermissions;

class CarInstallmentPolicy
{
    use HasPermissions;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user;

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        return $user;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        // if($user->hasRole('Super-Admin')){
        //     return true;
        // }
        if($user->can('create')){
            return true;
        }
        // // if($user->hasRole('Super-Admin')){
        //     return true;
        // }
       

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        // if($user->hasRole('Super-Admin')){
        //     return true;
        // }
        if($user->can('update')){
            return $user->can('update');
        }

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        // if($user->hasRole('Super-Admin')){
        //     return true;
        // }
        if($user->can('delete')){
            return $user->can('delete');
        }

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user)
    {
        // if($user->hasRole('Super-Admin')){
        //     return true;
        // }
        if($user->can('restore')){
            return $user->can('restore');
        }

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user)
    {
        // if($user->hasRole('Super-Admin')){
        //     return true;
        // }
        if($user->can('forceDelete')){
            return $user->can('forceDelete');
        }

    }
}
