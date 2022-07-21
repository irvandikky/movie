<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Genre;
use Illuminate\Auth\Access\HandlesAuthorization;

class GenrePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the genre can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the genre can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function view(User $user, Genre $model)
    {
        return true;
    }

    /**
     * Determine whether the genre can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the genre can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function update(User $user, Genre $model)
    {
        return true;
    }

    /**
     * Determine whether the genre can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function delete(User $user, Genre $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the genre can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function restore(User $user, Genre $model)
    {
        return false;
    }

    /**
     * Determine whether the genre can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Genre  $model
     * @return mixed
     */
    public function forceDelete(User $user, Genre $model)
    {
        return false;
    }
}
