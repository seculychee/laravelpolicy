<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function create (User $user) {
        return $user->hasAnyRole("admin", "user.create");
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function delete (User $user) {
        return $user->hasAnyRole("admin", "user.delete");
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function editRoles (User $user) {
        return $user->hasAnyRole("admin", "user.roles");
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function view (User $user) {
        return $user->hasAnyRole(
            "admin",
            "user.view",
            "user.create",
            "user.delete",
            "user.roles"
        );
    }


}
