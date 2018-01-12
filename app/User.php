<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Adds a role to user
     *
     * @param Role $role
     */
    public function addRole (Role $role) {

        if (!$this->hasRole($role)) {

            $this->roles()
                ->attach($role);
        }

    }

    /**
     * @param Collection $roles
     */
    public function addRoles (Collection $roles) {
        $this->roles()
            ->syncWithoutDetaching($roles);
    }

    /**
     * @param Collection $roles
     */
    public function syncRoles (Collection $roles) {
        $this->roles()
            ->sync($roles);
    }

    /**
     * @param Collection $roles
     */
    public function removeRoles (Collection $roles) {

        $this->roles()
            ->detach($roles);
    }

    /**
     * Removes a role from user
     *
     * @param $role
     */
    public function removeRole ($role) {

        if (!$role instanceof Role) {
            $role = Role::getBySlug($role);
        }

        $this->roles()
            ->detach($role);
    }

    /**
     * Checks the user has the given role
     *
     * @param $role
     *
     * @return boolean
     */
    public function hasRole ($role) {

        return $this->roles
                ->first(function (Role $ownedRole) use (&$role) {
                    return $ownedRole->slug == ($role instanceof Role ? $role->slug : $role);
                }) != null;
    }

    /**
     * Checks the user has any kind of
     * the given roles
     *
     * @param $roles
     *
     * @return boolean
     */
    public function hasAnyRole ($roles) {

        if (!is_array($roles)) {
            $roles = func_get_args();
        }

        return $this->roles
            ->whereIn("slug", $roles)
            ->isNotEmpty();
    }

    /**
     * Checks the user has all
     * the given roles
     *
     * @param $roles
     *
     * @return boolean
     */
    public function hasRoles ($roles) {

        if (!is_array($roles)) {
            $roles = func_get_args();
        }

        return $this->roles
                ->whereIn("slug", $roles)
                ->count() == count($roles);
    }
    /**
     * @return BelongsToMany
     */
    public function roles (): BelongsToMany {
        return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

}
