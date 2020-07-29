<?php

namespace App\Policies;

use App\Models\Volly;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VollyPolicy
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
        return $user->can('manage-volly') || $user->can('manage');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Volly  $volly
     * @return mixed
     */
    public function view(User $user, Volly $volly)
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
        return $user->can('manage-volly') || $user->can('manage');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Volly  $volly
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->can('manage-volly') || $user->can('manage');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Volly  $volly
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->can('manage-volly') || $user->can('manage');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Volly  $volly
     * @return mixed
     */
    public function restore(User $user, Volly $volly)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Volly  $volly
     * @return mixed
     */
    public function forceDelete(User $user, Volly $volly)
    {
        //
    }
}
