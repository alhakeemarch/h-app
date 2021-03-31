<?php

namespace App\Policies;

use App\OfficeDoc;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficeDocPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $allowed_users_id = [1, 2, 3, 13, 14, 16, 22, 24, 26, 27, 28,];
        if (in_array(auth()->user()->id, $allowed_users_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\OfficeDoc  $officeDoc
     * @return mixed
     */
    public function view(User $user, OfficeDoc $officeDoc)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\OfficeDoc  $officeDoc
     * @return mixed
     */
    public function update(User $user, OfficeDoc $officeDoc)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\OfficeDoc  $officeDoc
     * @return mixed
     */
    public function delete(User $user, OfficeDoc $officeDoc)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\OfficeDoc  $officeDoc
     * @return mixed
     */
    public function restore(User $user, OfficeDoc $officeDoc)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\OfficeDoc  $officeDoc
     * @return mixed
     */
    public function forceDelete(User $user, OfficeDoc $officeDoc)
    {
        //
    }
}
