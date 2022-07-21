<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the movie can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the movie can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Movie  $model
     * @return mixed
     */
    public function view(User $user, Movie $model)
    {
        return true;
    }

    /**
     * Determine whether the movie can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the movie can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Movie  $model
     * @return mixed
     */
    public function update(User $user, Movie $model)
    {
        return true;
    }

    /**
     * Determine whether the movie can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Movie  $model
     * @return mixed
     */
    public function delete(User $user, Movie $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Movie  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the movie can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Movie  $model
     * @return mixed
     */
    public function restore(User $user, Movie $model)
    {
        return false;
    }

    /**
     * Determine whether the movie can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Movie  $model
     * @return mixed
     */
    public function forceDelete(User $user, Movie $model)
    {
        return false;
    }
}
